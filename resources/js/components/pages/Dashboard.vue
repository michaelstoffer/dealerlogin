<template>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">Order History (<strong>{{ dealerName }}</strong>)</div>

					<div class="card-body">
						<div v-if="!isReady"><i class="fas fa-spinner fa-pulse"></i> Loading...</div>
						<table id="dealer-orders" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%" v-show="isReady">
							<thead>
								<tr>
									<th class="details-control"></th>
									<th class="th-sm">Name</th>
									<th class="th-sm">VIN (last6)</th>
									<th class="th-sm">Ref #</th>
									<th class="th-sm">Status</th>
									<th class="th-sm">Sign-off</th>
									<th class="th-sm">Critical Date</th>
									<th class="th-sm">Complete Date</th>
									<th class="th-sm">Paid</th>
								</tr>
							</thead>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
	export default {
		props: ['user'],

		data() {
			return {
				dealerName: 'Test Company',
				isReady: false
			};
		},

		mounted() {
			if (this.user.dealer.name) {
				this.dealerName = this.user.dealer.name;
				this.getStatuses();
			}
		},

		methods: {
			getStatuses() {
				axios.get(dealerHelper+this.user.dealer_id)
					.then(response => {
						if (response.status === 200) {
							this.isReady = true;
							this.showDataTable(response.data);
						}
					});
			},

			showDataTable(data) {
				/* Formatting function for row details - modify as you need */
				function format(d) {
					var additional_data = '';

					function filterDateFormat(value) {
						value = new Date(value);
						if (isNaN(value)) return "";

						var formattedDate = ('0' + value.getDate()).slice(-2);
						var formattedMonth = ('0' + (value.getMonth() + 1)).slice(-2);
						var formattedYear = value.getFullYear().toString().substr(2,2);

						// Combine and format date string
						return formattedMonth + '-' + formattedDate + '-' + formattedYear;
					}

					additional_data += '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px; width: 100%;">';
					if (d.customer_name) {
						additional_data += '<tr>'+
							'<td style="width: 200px;">Customer Name:</td>'+
							'<td>'+d.customer_name+'</td>'+
						'</tr>';
					}
					if (d.VIN) {
						additional_data += '<tr>'+
							'<td style="width: 200px;">VIN Number:</td>'+
							'<td>'+d.VIN+'</td>'+
						'</tr>';
					}
					if (d.statustext) {
						additional_data += '<tr>'+
							'<td style="width: 200px;">Status:</td>'+
							'<td>'+d.statustext+'</td>'+
						'</tr>';
					}
					if (d.statusdate) {
						additional_data += '<tr>'+
							'<td style="width: 200px;">Status Date:</td>'+
							'<td>'+filterDateFormat(d.statusdate)+'</td>'+
						'</tr>';
					}
					if (d.productiondate) {
						additional_data += '<tr>'+
							'<td style="width: 200px;">Production Date:</td>'+
							'<td>'+filterDateFormat(d.productiondate)+'</td>'+
						'</tr>';
					}
					if (d.paymentinfo) {
						additional_data += '<tr>'+
							'<td style="width: 200px;">Payment Info:</td>'+
							'<td>'+d.paymentinfo+'</td>'+
						'</tr>';
					}
					if (d.weight) {
						additional_data += '<tr>'+
							'<td style="width: 200px;">Weight:</td>'+
							'<td>'+d.weight+' lbs.</td>'+
						'</tr>';
					}

					return additional_data;
				}

				var table = $('#dealer-orders').DataTable({
					"data": data,
					"columns": [
						{
							"className":      'details-control',
							"orderable":      false,
							"data":           null,
							"defaultContent": '<i class="fas fa-plus-circle"></i>'
						},
						{
							"data": "customer_name"
						},
						{
							"data": "VIN",
							"render": function(value) {
								if (!value) return "";
								return value.substring(11);
							}
						},
						{
							"data": "refnumber"
						},
						{
							"data": "statustext"
						},
						{
							"data": "signoffdate",
							"type": 'date',
							"render": function(value) {
								value = new Date(value);
								if (isNaN(value)) return "";

								var formattedDate = ('0' + value.getDate()).slice(-2);
								var formattedMonth = ('0' + (value.getMonth() + 1)).slice(-2);
								var formattedYear = value.getFullYear().toString().substr(2,2);

								// Combine and format date string
								return formattedMonth + '-' + formattedDate + '-' + formattedYear;
							}
						},
						{
							"data": "criticaldate",
							"type": 'date',
							"render": function(value) {
								value = new Date(value);
								if (isNaN(value)) return "";

								var formattedDate = ('0' + value.getDate()).slice(-2);
								var formattedMonth = ('0' + (value.getMonth() + 1)).slice(-2);
								var formattedYear = value.getFullYear().toString().substr(2,2);

								// Combine and format date string
								return formattedMonth + '-' + formattedDate + '-' + formattedYear;
							}
						},
						{
							"data": "completedate",
							"type": 'date',
							"render": function(value) {
								value = new Date(value);
								if (isNaN(value)) return "";

								var formattedDate = ('0' + value.getDate()).slice(-2);
								var formattedMonth = ('0' + (value.getMonth() + 1)).slice(-2);
								var formattedYear = value.getFullYear().toString().substr(2,2);

								// Combine and format date string
								return formattedMonth + '-' + formattedDate + '-' + formattedYear;
							}
						},
						{
							"data": "paiddate",
							"type": 'date',
							"render": function(value) {
								value = new Date(value);
								if (isNaN(value)) return "";

								var formattedDate = ('0' + value.getDate()).slice(-2);
								var formattedMonth = ('0' + (value.getMonth() + 1)).slice(-2);
								var formattedYear = value.getFullYear().toString().substr(2,2);

								// Combine and format date string
								return formattedMonth + '-' + formattedDate + '-' + formattedYear;
							}
						}
					],
					"order": [[1, 'asc']]
				});

				// Add event listener for opening and closing details
				$('#dealer-orders tbody').on('click', 'td.details-control', function () {
					var tr = $(this).closest('tr');
					var row = table.row( tr );

					if ( row.child.isShown() ) {
						// This row is already open - close it
						row.child.hide();
						tr.removeClass('shown');
						tr[0].children[0].children[0].className = 'fas fa-plus-circle';
					}
					else {
						// Open this row
						row.child( format(row.data()) ).show();
						tr.addClass('shown');
						tr[0].children[0].children[0].className = 'fas fa-minus-circle';
					}
				});
			}
		}
	}
</script>
