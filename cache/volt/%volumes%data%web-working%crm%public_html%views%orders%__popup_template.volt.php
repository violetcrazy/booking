
<div class="modal fade" id="model_fee" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">
                    Thêm chi phí của đơn hàng
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">
                            ×
                        </span>
                </button>
            </div>
            <div class="modal-body">

                <div class="feePlusList" id="feePlusList">
                    <table class="table table-bordered">

                    </table>
                </div>
                <table class="table tableExcel">
                    <tbody id="">
                    <tr class="rowExcel">
                        <td colspan="2">
                            <input type="text" class="js_fee_name" placeholder="Tên, ghi chú khoản phí"></td>
                        <td width="20%">
                            <input type="text" class="formatCurrency js_fee_price" placeholder="Giá trị"></td>
                        <td width="10%">
                            <button type="button"
                                    class="btn btn-add-row"
                                    data-note=".js_fee_name"
                                    data-value=".js_fee_price"
                                    onclick="order.addFee(event, this, '#feePlusList')">
                                <span class="fa fa-plus"></span>
                            </button>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                    Đóng lại
                </button>
            </div>
        </div>
    </div>
</div>



    
<div class="modal fade" id="model_discount" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="">
                    Giảm giá đơn hàng này
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">
                            ×
                        </span>
                </button>
            </div>
            <div class="modal-body">
                <?= $this->callMacro('formGroupInputVertical', ['discount[value]', ['label' => 'Giảm', 'value' => '', 'id' => 'discount_value', 'type' => 'text', 'class' => 'formatCurrency']]) ?>
                <?= $this->callMacro('formGroupInputVertical', ['discount[note]', ['label' => 'Lý do, Ghi chú', 'value' => '', 'id' => 'discount_note', 'type' => 'textarea']]) ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                    Đóng lại
                </button>
                <button type="button" class="btn btn-success"
                        data-value="#discount_value"
                        data-note="#discount_note"
                        data-dismiss="modal"
                        onclick="$(document).trigger('changeDiscount', this)">
                    Lưu thay đổi.
                </button>
            </div>
        </div>
    </div>
</div>




<div class="modal fade" id="modal_change_price_of_product" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        
    </div>
</div>

<div style="display: none">
    <div id="templatePopupEditPrice">
        <form onsubmit="order.changePriceOfProduct(event, '{index}', this)">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        Thay đổi giá của sản phẩm
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">
                                &times;
                            </span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">
                            Giá mới sẽ áp dụng cho đơn hàng này <br>
                            <b>{name}</b>
                        </label>
                        <div class="input-group m-input-group m-input-group--air">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">
                                    {price_format}
                                </span>
                            </div>
                            <input
                                name="price_new"
                                type="text" class="form-control m-input formatCurrency"
                                placeholder="Giá mới" aria-describedby="basic-addon1">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="form-control-label">
                            Lý do thay đổi. (BẮT BUỘC)
                        </label>
                        <textarea
                            name="note"
                            class="form-control" id="message-text"></textarea>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        Đóng lại
                    </button>
                    <button type="submit" class="btn btn-primary">
                        Lưu thay đổi
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

