<template>
	<div class="container">
		<div class="row" v-cloak>
			<div class="col-md-3 mb-3">
				<div class="card">
					<div class="card-header"><i class="fas fa-car-mechanic"></i> Service</div>
					<div class="card-body">
						<div id="service" class="nav flex-column nav-pills">
							<h6 class="dropdown-header">inTech</h6>
							<a class="nav-link warranty">Warranty</a>
							<a class="nav-link service-bulletins">Service Bulletins</a>
							<a class="nav-link install-guides">Install Guides</a>
							<a class="nav-link care-and-maintenance">Care & Maintenance</a>
							<h6 class="dropdown-header">Vendor</h6>
							<a class="nav-link warranty-contacts">Warranty Contacts</a>
							<a class="nav-link manuals-and-trouble-shooting">Manuals & Trouble Shooting</a>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-9">
				<div v-if="currentPage === 'warranty' && Object.keys(currentContent).length > 0">
					<div class="card">
						<div class="card-header"><i class="fas fa-car-crash"></i> {{ currentContent.title }}</div>
						<div class="card-body">
							<p>{{ currentContent.contact_name }}</p>
							<h3><i class="fas fa-envelope"></i> <span v-html="printEmail(currentContent.contact_email, currentContent.title)"></span></h3>
							<br/>
							<div v-html="currentContent.body"></div>
						</div>
						<div class="card-footer">
							<div class="row">
								<div class="col-md-6 text-center">
									<strong><i class="fas fa-envelope"></i> Email:</strong>
								</div>
								<div class="col-md-6 text-center">
									<strong><i class="fas fa-phone"></i> Phone:</strong>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6 text-center" v-html="printEmail(currentContent.contact_email, currentContent.title)"></div>
								<div class="col-md-6 text-center" v-html="printPhone(currentContent.contact_phone)"></div>
							</div>
						</div>
					</div>
				</div>
				<div v-if="currentPage === 'service-bulletins'">
					<div class="card">
						<div class="card-header"><i class="fas fa-keynote"></i> Service Bulletin's</div>

						<div class="card-body">
							<table id="service-bulletins" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
								<thead>
									<tr>
										<th class="details-control"></th>
										<th class="th-sm">Name</th>
										<th class="th-sm">Line</th>
										<th class="th-sm">Range</th>
										<th class="th-sm">Issued Date</th>
										<th class="th-sm">PDF</th>
									</tr>
								</thead>
							</table>
						</div>
					</div>
				</div>
				<div v-if="currentPage === 'install-guides'">
					<div class="card">
						<div class="card-header"><i class="far fa-th"></i> Install Guide's</div>

						<div class="card-body">
							<table id="install-guides" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
								<thead>
									<tr>
										<th class="details-control"></th>
										<th class="th-sm">Name</th>
										<th class="th-sm">Line</th>
										<th class="th-sm">Model Year's</th>
										<th class="th-sm">PDF</th>
									</tr>
								</thead>
							</table>
						</div>
					</div>
				</div>
				<div v-if="currentPage === 'care-and-maintenance' && Object.keys(carePDFs).length > 0">
					<div class="btn-toolbar flex-column mb-3" role="toolbar">
						<div class="btn-group justify-content-center">
							<button class="btn btn-outline-primary care-and-maintenance-filter-group active" data-filter="*">All</button>
						</div>
					</div>
					<div class="d-flex flex-wrap">
						<div class="position-relative img-container mr-3" v-for="image in carePDFs">
							<figure class="care-and-maintenance-grid figure">
								<img class="care-and-maintenance-grid-item care-and-maintenance" :src="getSrc(image)" :srcset="getSrcSet(image)" alt="" />
								<figcaption class="figure-caption text-center pt-2">{{ getCaption(image.split('/').pop().replace('.jpg', '.pdf')) }}</figcaption>
							</figure>
							<div class="download-btn">
								<a :href="getHREF(image)" title="View" target="_blank">
									<i class="far fa-eye position-absolute"></i>
								</a>
								<a :href="getHREF(image)" :download="getDownload(image)" title="Download" target="_blank">
									<i class="fas fa-download position-absolute"></i>
								</a>
							</div>
						</div>
					</div>
				</div>
				<div v-if="currentPage === 'warranty-contacts'">
					<div class="card">
						<div class="card-header"><i class="fas fa-id-card"></i> Warranty Contact's</div>

						<div class="card-body">
							<table id="warranty-contacts" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
								<thead>
									<tr>
										<th class="details-control"></th>
										<th class="th-sm">Name</th>
										<th class="th-sm">Phone</th>
										<th class="th-sm">Website</th>
										<th class="th-sm">PDF</th>
									</tr>
								</thead>
							</table>
						</div>
					</div>
				</div>
				<div v-if="currentPage === 'manuals-and-trouble-shooting' && Object.keys(productModels).length > 0 && Object.keys(productCategories).length > 0">
					<productSearch :models="productModels" :categories="productCategories"></productSearch>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
	import productSearch from '../partials/ProductSearch.vue';

	export default {
		props: ["user", "page"],
		components: { productSearch },

		data() {
			return {
				currentPage: '',
				currentContent: [],
				productModels: [],
				productCategories: [],
				carePDFs: [],
			};
		},

		mounted() {
			this.currentPage = this.page;
			this.changeActiveState();
			this.getContent(this.currentPage);
			// this.loadItem('care-and-maintenance');
		},

		methods: {
			changeActiveState() {
				var self = this;
				$(document).ready(function() {
					$("."+window.location.href.split('/').pop()).addClass('active');
					$("#service.nav-pills .nav-link").click(function() {
						$(this).addClass("active").siblings().removeClass("active");
						var link = $(this).text().toLowerCase().replace(" ", "-").replace(" ", "-").replace(" ", "-").replace("&", "and");
						self.currentPage = link;
						self.getContent(link);
					});
				});
			},

			getContent(link) {
				// Change the URL to this link...
				history.pushState({}, null, link);

				axios.get('/api/service/'+link)
					.then(response => {
						if (response.status === 200) {
							if (link === "warranty") {
								this.showWarrantyData(response.data);
							}

							if (link === "service-bulletins") {
								this.showServiceDataTable(response.data);
							}

							if (link === "install-guides") {
								this.showInstallDataTable(response.data);
							}

							if (link === "care-and-maintenance") {
								this.showCareAndMaintenance(response.data);
							}

							if (link === "warranty-contacts") {
								this.showWarrantyDataTable(response.data);
							}

							if (link === "manuals-and-trouble-shooting") {
								this.showTroubleShootingAndManuals(response.data);
							}
						}
					});
			},

			printEmail(email, title) {
				return '<a href="mailto:'+email+'?subject='+title+'%20Request%20From%20Dealer%20Login%20Site">'+email+'</a>';
			},

			printPhone(phone) {
				var number = phone.replace('(', '').replace(')', '').replace('-', '').replace(' ', '').replace(' ', '').replace(' ', '').split('Ext.');
				return '<a href="tel:'+number[0]+','+number[1]+'">'+phone+'</a>';
			},

			showWarrantyData(data) {
				this.currentContent = data;
			},

			showServiceDataTable(data) {
				/* Formatting function for row details - modify as you need */
				function format(d) {
					var additional_data = '';

					additional_data += '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px; width: 100%;">';

					if (d.models.length > 0) {
						var names = [];
						for (var i = 0; i < d.models.length; i++) {
							names.push(d.models[i].name);
						}

						additional_data += '<tr>'+
							'<td style="width: 200px;">Models:</td>'+
							'<td>'+names.join(', ');+'</td>'+
						'</tr>';
					} else {
						additional_data += '<tr>'+
							'<td style="width: 200px;">Models:</td>'+
							'<td>No Models have been attached to this Bulletin.</td>'+
						'</tr>';
					}

					additional_data += '</table>';

					return additional_data;
				}

				var serviceTable = $('#service-bulletins').DataTable({
					data: data,
					columns: [
						{
							className: 'details-control',
							orderable: false,
							data: null,
							defaultContent: '<i class="fas fa-plus-circle"></i>'
						},
						{
							data: 'name'
						},
						{
							data: 'line.name'
						},
						{
							data: 'range',
							orderable: false,
						},
						{
							data: 'created_at',
							type: 'date',
							render: function ( data, type, row, meta ) {
								var myDate = data.split(' ')[0];
								return myDate.split('-')[1]+'-'+myDate.split('-')[2]+'-'+myDate.split('-')[0].substring(2);
							}
						},
						{
							data: 'pdf',
							render: function ( data, type, row, meta ) {
								return data ? '<a href="/storage/'+data+'" target="_blank" data-toggle="tooltip" data-placement="top" title="'+row.pdf_name+'"><i class="far fa-file-pdf"></i></a>' : '';
							}
						},
					],
					order: [[1, 'asc']],
				});

				// Add event listener for opening and closing details
				$('#service-bulletins tbody').on('click', 'td.details-control', function () {
					var tr = $(this).closest('tr');
					var row = serviceTable.row( tr );

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
			},

			showInstallDataTable(data) {
				/* Formatting function for row details - modify as you need */
				function format(d) {
					var additional_data = '';

					additional_data += '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px; width: 100%;">';

					if (d.models.length > 0) {
						var names = [];
						for (var i = 0; i < d.models.length; i++) {
							names.push(d.models[i].name);
						}

						additional_data += '<tr>'+
							'<td style="width: 200px;">Models:</td>'+
							'<td>'+names.join(', ');+'</td>'+
						'</tr>';
					} else {
						additional_data += '<tr>'+
							'<td style="width: 200px;">Models:</td>'+
							'<td>No Models have been attached to this Install Guide.</td>'+
						'</tr>';
					}

					additional_data += '</table>';

					return additional_data;
				}

				var installTable = $('#install-guides').DataTable({
					data: data,
					columns: [
						{
							className: 'details-control',
							orderable: false,
							data: null,
							defaultContent: '<i class="fas fa-plus-circle"></i>'
						},
						{
							data: 'name'
						},
						{
							data: 'line.name'
						},
						{
							data: 'years'
						},
						{
							data: 'pdf',
							render: function ( data, type, row, meta ) {
								return data ? '<a href="/storage/'+data+'" target="_blank" data-toggle="tooltip" data-placement="top" title="'+row.pdf_name+'"><i class="far fa-file-pdf"></i></a>' : '';
							}
						}
					],
					order: [[1, 'asc']]
				});

				// Add event listener for opening and closing details
				$('#install-guides tbody').on('click', 'td.details-control', function () {
					var tr = $(this).closest('tr');
					var row = installTable.row( tr );

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
			},

			getHREF(img) {
				return '/' + img.replace('thumbs/', '').replace('.jpg', '.pdf');
			},

			getSrc(img) {
				return '/' + img;
			},

			getSrcSet(img) {
				return '/' + img + ' 1x, ' + '/' + img.replace('thumbs/', 'thumbs/@2x/') + ' 2x';
			},

			getCaption(title) {
				var newTitle = title.replace('.pdf', '').replace('.PDF', '');
				if (newTitle.length > 15) {
					return newTitle.substring(0, 15)+'...';
				}

				return newTitle;
			},

			getDownload(img) {
				return img.split('/').pop().replace('.jpg', '.pdf');
			},

			loadItem(item_type) {
				$(document).ready(function() {
					$('.'+item_type+'-filter-group').click(function() {
						$(this).addClass('active').siblings().removeClass('active');
						var filter = $(this).data('filter');
						$('.'+item_type+'-grid').magnet({
							filter: filter,
							itemSelector: '.'+item_type+'-grid-item',
							layoutMode: 'grid',
							layoutInstant: true,
							itemStyle: {
								position: 'initial',
							},
							containerStyle: { position: 'relative' },
							hiddenStyle: {
								opacity: 0
							},
							visibleStyle: {
								opacity: 1
							}
						});
					});
				});
			},

			showCareAndMaintenance(data) {
				this.carePDFs = data;
			},

			showWarrantyDataTable(data) {
				/* Formatting function for row details - modify as you need */
				function format(d) {
					function telephoneNum(tel) {
						return tel.replace('(', '').replace(')', '').replace('-', '').replace('-', '').replace(' ', '').replace(' ', '').replace(' ', '');
					}

					var additional_data = '';

					additional_data += '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px; width: 100%;">';
					if (d.customer_service_phone) {
						additional_data += '<tr>'+
							'<td style="width: 200px;">Customer Service Phone:</td>'+
							'<td><a href="tel:'+telephoneNum(d.customer_service_phone)+'">'+d.customer_service_phone+'</a></td>'+
						'</tr>';
					}
					if (d.technical_support_phone) {
						additional_data += '<tr>'+
							'<td style="width: 200px;">Technical Support Phone:</td>'+
							'<td><a href="tel:'+telephoneNum(d.technical_support_phone)+'">'+d.technical_support_phone+'</a></td>'+
						'</tr>';
					}
					if (d.warranty_phone) {
						additional_data += '<tr>'+
							'<td style="width: 200px;">Warranty Phone:</td>'+
							'<td><a href="tel:'+telephoneNum(d.warranty_phone)+'">'+d.warranty_phone+'</a></td>'+
						'</tr>';
					}
					if (d.customer_service_email) {
						additional_data += '<tr>'+
							'<td style="width: 200px;">Customer Service Email:</td>'+
							'<td><a href="mailto:'+d.customer_service_email+'">'+d.customer_service_email+'</a></td>'+
						'</tr>';
					}
					if (d.technical_support_email) {
						additional_data += '<tr>'+
							'<td style="width: 200px;">Technical Support Email:</td>'+
							'<td><a href="mailto:'+d.technical_support_email+'">'+d.technical_support_email+'</a></td>'+
						'</tr>';
					}
					if (d.warranty_email) {
						additional_data += '<tr>'+
							'<td style="width: 200px;">Warranty Email:</td>'+
							'<td><a href="mailto:'+d.warranty_email+'">'+d.warranty_email+'</a></td>'+
						'</tr>';
					}

					return additional_data;
				}

				var warrantyTable = $('#warranty-contacts').DataTable({
					data: data,
					columns: [
						{
							className: 'details-control',
							orderable: false,
							data: null,
							defaultContent: '<i class="fas fa-plus-circle"></i>'
						},
						{
							data: 'vendor.name',
						},
						{
							data: 'phone',
							render: function ( data, type, row, meta ) {
								var number = data.replace('(', '').replace(')', '').replace('-', '').replace('-', '').replace(' ', '').replace(' ', '').replace(' ', '');
								return '<a href="tel:'+number+'">'+data+'</a>';
							}
						},
						{
							data: 'website',
							render: function ( data, type, row, meta ) {
								return '<a href="'+data+'" target="_blank">'+data+'</a>';
							}
						},
						{
							data: 'pdf',
							render: function ( data, type, row, meta ) {
								return data ? '<a href="/storage/'+data+'" target="_blank" data-toggle="tooltip" data-placement="top" title="'+row.pdf_name+'"><i class="far fa-file-pdf"></i></a>' : '';
							}
						},
					],
					order: [[1, 'asc']]
				});

				// Add event listener for opening and closing details
				$('#warranty-contacts tbody').on('click', 'td.details-control', function () {
					var tr = $(this).closest('tr');
					var row = warrantyTable.row( tr );

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
			},

			showTroubleShootingAndManuals(data) {
				this.productModels = data.models;
				this.productCategories = data.categories;
			}
		}
	}
</script>

<style scoped>
	[v-cloak] {
		display: none;
	}

	.nav-pills .nav-link {
		color: #cc582c;
		cursor: pointer;
	}

	.nav-pills .nav-link.active {
		color: #ffffff;
	}
</style>
