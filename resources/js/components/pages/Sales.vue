<template>
	<div class="container">
		<div class="row mb-4">
			<div class="col-md-12">
				<div class="btn-toolbar flex-column mb-3" role="toolbar">
					<div class="btn-group justify-content-center">
						<button class="btn btn-outline-primary flyer-chase">Flyer Chase</button>
						<button class="btn btn-outline-primary flyer-pursue">Flyer Pursue</button>
						<button class="btn btn-outline-primary flyer-explore">Flyer Explore</button>
						<button class="btn btn-outline-primary luna-lite">Luna Lite</button>
						<button class="btn btn-outline-primary luna-rover">Luna Rover</button>
						<button class="btn btn-outline-primary luna">Luna</button>
						<button class="btn btn-outline-primary sol">Sol</button>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="row disclaimer">
					<div class="col-md-12">
						<p class="text-center font-italic mb-5">*Because of the form elements within these tools, these are best viewed with the Chrome Browser or Downloaded.</p>
					</div>
				</div>
				<div class="row sales-grid">
					<div class="col-md-6">
						<h3 class="text-center">2019 Dealer Pricing</h3>
						<div class="position-relative dealer-pricing-grid img-container" v-if="Object.keys(dealerpricing2019).length > 0" v-for="image in dealerpricing2019">
							<img class="dealer-pricing-grid-item dealer-pricing" :src="getSrc(image)" :srcset="getSrcSet(image)" alt="" />
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
					<div class="col-md-6">
						<h3 class="text-center">2019 MSRP Pricing</h3>
						<div class="position-relative msrp-pricing-grid img-container" v-if="Object.keys(msrppricing2019).length > 0" v-for="image in msrppricing2019">
							<img class="msrp-pricing-grid-item msrp-pricing" :src="getSrc(image)" :srcset="getSrcSet(image)" alt="" />
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
			</div>
		</div>
	</div>
</template>

<script>
export default {
	props: ['user', 'page'],

	data() {
		return {
			dealerpricing2019: [],
			msrppricing2019: [],
			currentPage: ''
		};
	},

	mounted() {
		this.currentPage = this.page;
		this.changeActiveState();
		this.getPricingSheets(this.currentPage);
	},

	methods: {
		changeActiveState() {
			var self = this;
			$(document).ready(function() {
				$("."+window.location.href.split('/').pop()).addClass('active');
				$(".btn-outline-primary").click(function() {
					$(this).addClass("active").siblings().removeClass("active");
					var link = this.innerHTML.toLowerCase().replace(" ", "-");
					self.getPricingSheets(link);
				});
			});
		},

		getPricingSheets(link) {
			// Change the URL to this link...
			history.pushState({}, null, link);

			axios.get('/api/sales-tools/'+link)
				.then(response => {
					if (response.status === 200) {
						this.dealerpricing2019 = response.data.dealer2019;
						this.msrppricing2019 = response.data.msrp2019;
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

		getDownload(img) {
			return img.split('/').pop().replace('.jpg', '.pdf');
		}
	}
}
</script>
