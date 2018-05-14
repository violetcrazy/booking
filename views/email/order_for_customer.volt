{% set css_summary = "background: #fff; padding: 15px;" %}
{% set css_header = "background: #4caf50; color: #fff; font-size: 20px; text-align: center; padding: 6px 12px;" %}
{% set css_td_customer = "padding: 7px; border: 1px solid #f0f0f0;" %}

{% set css_subtotal = "color: red; font-size: 14px; font-weight: bold" %}
{% set css_total = "color: red; font-size: 18px; font-weight: bold" %}
{% set css_order_table = "font-size: 14px; width: 100%" %}
{% set css_image = "width: 50px; height: 50px; object-fit: contain; float: left; margin-right: 10px;" %}

{% set css_td_product = "padding: 5px 10px; border: 1px solid #f0f0f0; vertical-align: top" %}


<div class="html" 
	style="background-color: #f0f0f0;
		padding: 15px 0;
		font-family: Arial;
		line-height: 1.5;
	">
	<div 
		class="body"
		style="
			max-width: 600px;
			margin: auto;
			background-color: #fff;
			min-height: 400px;
			padding: 0px;
			box-shadow: 0 0 10px rgba(0,0,0,0.2)
		"
	>
		<div style="{{ css_header }}" >
			Nữ hoàng Sale
		</div>
		
		<div style="{{ css_summary }}">
			<div>
				Cảm ơn quý khách <b>{{ orderDetail.getBilling('name') }}</b> đã đặt hàng tại NuHoangSale.com,
			</div>
			<p style="font-size: 14px;">
				<i>NuHoangSale.com rất vui thông báo đơn hàng <b>#{{ orderDetail.order_id }}</b> của quý khách đã được tiếp nhận và đang trong quá trình xử lý.
					NuHoangSale sẽ thông báo đến quý khách ngay khi hàng chuẩn bị được giao.</i>
			</p>

			{#
			<div><b>TRẠNG THÁI ĐƠN HÀNG</b>
				<span style="background: #4caf50; color: #fff; display: inline-block; padding: 2px 5px;">
					{{ orderDetail.getStatusHtml() }}
				</span>
			<br><br>	
			</div>	
			#}

			<div>
				<b>Thông tin mua hàng</b></div>
			<table style="width: 100%" cellpadding="0" cellspacing="0" border="0">
				<tr>
					<td style="{{ css_td_customer }}">Họ và tên</td>
					<td style="{{ css_td_customer }}">{{ orderDetail.getBilling('name') }}</td>
				</tr>

				<tr>
					<td style="{{ css_td_customer }}">Điện thoại</td>
					<td style="{{ css_td_customer }}">{{ orderDetail.getBilling('phone') }}</td>
				</tr>
				<tr>
					<td style="{{ css_td_customer }}">Email</td>
					<td style="{{ css_td_customer }}">{{ orderDetail.getBilling('email') }}</td>
				</tr>

				<tr>
					<td style="{{ css_td_customer }}">Địa chỉ</td>
					<td style="{{ css_td_customer }}"> {{ orderDetail.getBilling('address') }}</td>
				</tr>
			</table>



			<div style="margin-top: 30px;"><b>Chi tiết đơn hàng</b></div>
			<table style="{{ css_order_table }}" cellspacing="0" cellpadding="0">
				{% for item in orderDetail.getItems('array') %}
				<tr>
					<td style="{{ css_td_product }}">
						<img 
						style="{{ css_image }}"
						src="{{ item['product_image'] }}" alt="">
						<a target="_blank" href="{{ item['product_url'] }}">{{ item['name'] }}</a>
					</td>
					<td style="white-space: nowrap; {{ css_td_product }}">
                        {{ util.currencyFormat(item['price']) }} x {{ item['qty'] }}
					</td>
					<td style="text-align: right; {{ css_td_product }}">
						<span style="{{ css_subtotal }}">
							{{ util.currencyFormat(item['price'] * item['qty']) }}
						</span>
					</td>
				</tr>
				{% endfor %}

				{% for fee in orderDetail.getFee()  %}
					<tr>
						<td style="text-align: right; {{ css_td_product }}"  colspan="2" >{{ fee['note'] }}</td>
						<td style="text-align: right; {{ css_td_product }}" ><b>{{ util.currencyFormat(fee['value']) }}</b></td>
					</tr>
				{% endfor %}

				<tr>
					<td colspan="2" style="text-align: right; font-size: 16px; {{ css_td_product }}">
						Tổng cộng
					</td>
					<td style="text-align: right; {{ css_td_product }}; vertical-align:middle">
						<span style="{{ css_total }}">{{ util.currencyFormat(orderDetail.total_price) }}</span>
					</td>
				</tr>
			</table>


			<div style="margin-top: 30px;">
				<div><b>
					Công ty TNHH NuHoangSale
				</b></div>
				<div>
					<i>Địa chỉ 1</i> : 685/66/14B Xô Viết Nghệ Tĩnh, Phường 26, Q. Bình thạnh, TP.HCM <br>
					<i>Địa chỉ 2</i> : 121 Đường 3/2, Phường 11, Quận 10, HCM <br>
					<i>Số điện thoại</i>: (08) 6653 0123 <br>
					<i>Email</i>: victoriashop39@gmail.com <br>
					<i>Website</i>: nuhoangsale.com
				</div>
			</div>
		</div>
	</div>
</div>