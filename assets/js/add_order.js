var dateData = new Date();
var ajaxSearchProduct = false;
var ajaxSearchTimeout = false;
var jsonProductSelectCurrent = {};
var order = {
    itemsline: [],
    total: 0,
    subtotal: 0,
    discount: 0,
    discount_note: '',
    fee_total: 0,
    fee: [],
    selectors: {
        subtotal: $('.js_subtotal .value'),
        discount: $('.js_discount .value'),
        total: $('.js_total .value'),
        tableItem: $('#itemsLine'),
        groupTotal: $('.groupTotal tbody'),
        orderDetail: $('#order_detail'),
        feePlusList : $('#feePlusList table')
    },
    template: {
        itemLine: $('#temlateItemLine tbody').html(),
        groupTotal: '<tr><td style="width: 60%" class="text-right">{note}</td><td><b>{value}</b></td></tr>',
        feeList: '<tr>\
                    <td class="text-dark">{note}</td>\
                    <td width="1%"><b>{value}</b></td>\
                    <td width="1%">\
                    <button class="btn-xs btn btn-danger" type="button" onclick="order.deleteFee(event, {index})">Xóa</button></td>\
                </tr>'
    },
    reload: function(){
        this.init();
    },
    resetBeforeReder: function(){
        this.selectors.tableItem.html('');
        this.selectors.groupTotal.html('');
        order.selectors.feePlusList.html('');
        this.total = this.subtotal = this.fee_total = 0;
    },
    deleteItem: function(event, index){
        if (typeof this.itemsline[index] != 'undefined') {
            delete this.itemsline[index];
            this.reload();
        }
    },
    changeQty: function(event, index, type){
        if (type === '-') {
            this.itemsline[index]['qty'] --;
            if (this.itemsline[index]['qty'] <= 0) {
                this.itemsline[index]['qty'] = 1;
            }
        } else if(type === '+'){
            this.itemsline[index]['qty'] ++;
        } else if(type === 'input'){
            var vl = $(event.target).val();
            vl = parseInt(vl);
            if (vl >= 0) {
                this.itemsline[index]['qty'] = vl;
            } else {
                alert('Giá trị phải lớn hơn 0');
                this.itemsline[index]['qty'] = 1;
            }

        }

        this.reload();
    },
    init: function(){
        var that = this;
        that.resetBeforeReder();

        $.each(that.itemsline, function(index, productData){
            if (typeof productData  !== 'undefined' && productData && productData !== null) {
                productData.index = index;

                if (typeof productData.product_url != 'undefined') {
                    productData.url = productData.product_url;
                }

                productData.price_format = numberFormat.to(productData.price *1);
                productData.total_format = numberFormat.to(productData.price * productData.qty);
                that.selectors.tableItem.prepend(nano(that.template.itemLine, productData));
                that.subtotal += parseFloat(productData.price * productData.qty);
            }
        });

        order.selectors.groupTotal.append(nano(order.template.groupTotal, {
            note: "Sản phẩm",
            value: numberFormat.to(that.subtotal)
        }));

        if (that.fee.length > 0){
            $.each(that.fee, function (index, fee) {
                if (typeof fee === 'object' && fee !== null) {
                    var value = parseFloat(fee.value);
                    if (value > 0) {
                        that.fee_total += value;
                        order.selectors.groupTotal.append(nano(order.template.groupTotal, {
                            note: fee.note,
                            value: numberFormat.to(value)
                        }));
                        order.selectors.feePlusList.append(nano(order.template.feeList, {
                            note: fee.note,
                            value: numberFormat.to(value),
                            index: index
                        }));
                    }
                }
            });
        }

        that.subtotal += that.fee_total;
        order.selectors.groupTotal.append(nano(order.template.groupTotal, {
            note: '<b>Tạm tính</b>',
            value: numberFormat.to(that.subtotal)
        }));

        if (that.discount > 0) {
            order.selectors.groupTotal.append(nano(order.template.groupTotal, {
                note: '<b>Giảm giá</b><br>' + that.discount_note,
                value: numberFormat.to( -1 * that.discount)
            }));
        }

        that.total = that.subtotal - that.discount;
        order.selectors.groupTotal.append(nano(order.template.groupTotal, {
            note: '<b>Tổng cộng</b>',
            value: '<b class="priceBig">' + numberFormat.to(that.total) + '</b>'
        }));


        that.bindInput();
    },
    bindInput: function(){
        var that = this;
        that.selectors.orderDetail.val(JSON.stringify({
            itemsline: that.itemsline,
            total: that.total,
            subtotal: that.subtotal,
            discount: that.discount,
            discount_note: that.discount_note,
            fee_total: that.fee_total,
            fee: that.fee
        }));
    },
    deleteFee: function(event, index){
        if (typeof this.fee[index] !== 'undefined') {
            delete this.fee[index];
            this.reload();
        }
    },

    changePriceOfProduct: function(event, index, form){
        var that = this;
        var $form = $(form);
        var price_new = numberFormat.from($form.find('[name="price_new"]').val());
        var note = $form.find('[name="note"]').val();

        // SAVE
        if (typeof that.itemsline[index] !== 'undefined') {
            if (price_new > 0 && $.trim(note) !== '') {
                that.itemsline[index]['price'] = price_new;

                note = "Thay đổi giá "+ that.itemsline[index]['name'] +"<br> Từ<b>"+ that.itemsline[index]['price_format'] +"</b> từ  thành <b>"+ numberFormat.to(price_new) +"</b>. Ghi chú <i><b>" + note + '</b></i>';

                event.preventDefault();
                mApp.block($form, {
                    overlayColor: '#000000',
                    type: 'loader',
                    state: 'primary',
                    message: 'Đang xử lý...',
                    opacity: 0.3
                });

                var data = $form.serialize();
                $.ajax({
                    url: urls.add_note,
                    data: {
                        note_content: note,
                        order_id: that.order_id
                    },
                    type : 'post',
                    dataType: 'json',
                    success: function(res){
                        $(document).trigger('loadNotes');
                        mApp.unblock($form);
                        $form.trigger('reset');
                    }
                })
            }
        }

        that.reload();
        $('#modal_change_price_of_product').modal('hide');

        event.preventDefault();

    },

    changePriceOfProductPopup: function(event, index){
        var that = this;

        if (!(that.order_id > 0)) {
            alert('Chỉ được thay đổi giá khi đơn hàng đã được tạo');
            return false;
        }

        if (typeof that.itemsline[index] != 'undefined') {
            var product = that.itemsline[index];
            var html = $('#templatePopupEditPrice').html();
            html = nano(html, product);

            $('#modal_change_price_of_product').find('.modal-dialog').html(html);
            $('#modal_change_price_of_product').modal('show');

            $(".formatCurrency").number(true,0);
        }

    },
    addFee: function(event, targetEvent, el){
        var that = this;
        var data = $(targetEvent).data();
        var tr = $(targetEvent).closest('tr');

        if ((typeof  data.value !== 'undefined' && $(data.value).length > 0)
            &&
            (typeof  data.note !== 'undefined' && $(data.note).length > 0)) {
            var feeVl = $(data.value).val();
            feeVl = parseInt(feeVl);

            if(typeof that.fee !== "object") {
                that.fee = [];
            }

            if (feeVl > 0 && $(data.note).val() !== '') {
                that.fee.push({
                    'value': feeVl,
                    'note': $(data.note).val()
                });
            }
            $(data.note).val('').focus();
            $(data.value).val(0);

        }
        this.reload();
    },
    changeDiscount: function(event, el){
        var data = $(el).data();

        if (typeof  data.value !== 'undefined' && $(data.value).length > 0) {
            var discountVl = $(data.value).val();
            discountVl = parseFloat(discountVl);
            order.discount = discountVl;
            order.discount_note = $(data.note).val();
        }

        this.reload();
    },
    addProduct: function(event, tbody){
        var d = new Date();

        var $tr = $(event.target).closest('tr');
        var productData = {
            'name': $.trim($tr.find('.js_product_name').val()),
            'price': parseFloat($tr.find('.js_product_price').val()),
            'qty': parseInt($tr.find('.js_product_qty').val())
        };

        if (productData.name === '' || productData.price === '') {
            return false;
        }

        if (productData.price > 0){
            productData.total = productData.price * productData.qty
        }

        productData.index = d.getTime();
        productData.price_format = numberFormat.to(productData.price);
        productData.total_format = numberFormat.to(productData.total);
        productData.sku = jsonProductSelectCurrent.sku;
        productData.url = jsonProductSelectCurrent.url;
        productData.image = jsonProductSelectCurrent.image;
        productData.url = jsonProductSelectCurrent.url;

        order.itemsline.push(productData);

        $tr.find('.js_product_name').val('').focus();
        $tr.find('.js_product_price').val(0);
        $tr.find('.js_product_qty').val(1);

        $(document).trigger('refreshTotal');
    },

    saveNote: function(event, url) {
        event.preventDefault();
        var $form = $(event.target).closest('form');
        mApp.block($form, {
            overlayColor: '#000000',
            type: 'loader',
            state: 'primary',
            message: 'Đang xử lý...',
            opacity: 0.3
        });

        var data = $form.serialize();
        $.ajax({
            url: url,
            data: data,
            type : 'post',
            dataType: 'json',
            success: function(res){
                $(document).trigger('loadNotes');
                mApp.unblock($form);
                $form.trigger('reset');
            }
        })
    },

    addProductByJson: function (event, el) {
        var json = $(el).find('.jsondata').text();
        json = JSON.parse(json);
        jsonProductSelectCurrent = json;
        if(typeof json === 'object') {
            $('.js_product_name').val(json.name);
            $('.js_product_price').val(numberFormat.from(json.price));
            $('.js_product_qty').val(1);

            $('.resultProducts').html('')
        }
    },
    findProduct: function (event, el) {
        var html = "<div class='m-widget4 listResult' style='width: 100%'>";
        var template = $('#templateWidget4').html();
        var data = $(el).data();
        $(el).parent().addClass('m-loader m-loader--primary m-loader--right');

        $(data.result).html('');

        var url = data.url;
        url += '?q=' + $(el).val();

        try {
            ajaxSearchProduct.abort();
            clearTimeout(ajaxSearchTimeout);
        } catch (error) {
        }


        ajaxSearchTimeout = setTimeout(function(){
            ajaxSearchProduct = $.getJSON(url, function(res){
                $(el).parent().removeClass('m-loader m-loader--primary m-loader--right');

                if (typeof res.result !== 'undefined' && res.result.length > 0) {
                    $.each(res.result, function(index, value){
                        html += nano(template, {
                            "image" : value.image,
                            "name" : value.name,
                            "desc" : "",
                            "sku" : value.sku,
                            "url" : value.url,
                            "price" : numberFormat.to(parseInt(value.price)),
                            "jsondata": JSON.stringify(value)
                        })
                    })
                }
                html += '</div>';
                $(data.result).html(html);

            });
        }, 400);
    }
};





$(document).ready(function(){
});