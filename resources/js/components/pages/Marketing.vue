<template>
	<div class="container">
		<div class="row" v-cloak>
			<div class="col-md-3 mb-3">
				<div class="card">
					<div class="card-header"><i class="fas fa-poll"></i> Marketing Materials</div>
					<div class="card-body">
						<div id="marketing" class="nav flex-column nav-pills">
							<a class="nav-link logos">Logos</a>
							<a class="nav-link brochures">Brochures</a>
							<a class="nav-link flyer-chase">Flyer Chase</a>
							<a class="nav-link flyer-pursue">Flyer Pursue</a>
							<a class="nav-link flyer-explore">Flyer Explore</a>
							<a class="nav-link luna-lite">Luna Lite</a>
							<a class="nav-link luna-rover">Luna Rover</a>
							<a class="nav-link luna">Luna</a>
							<a class="nav-link sol">Sol</a>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-9">
				<div v-if="currentPage === 'logos' && Object.keys(logos).length > 0">
					<div class="btn-toolbar flex-column mb-3" role="toolbar">
						<div class="btn-group justify-content-center">
							<button class="btn btn-outline-primary logos-filter-group active" data-filter="*">All</button>
						</div>
					</div>
					<div class="d-flex flex-wrap">
						<div class="position-relative logos-grid img-container" v-for="image in logos">
							<img class="logos-grid-item logos" :src="getSrc(image)" :srcset="getSrcSet(image)" alt="" />
							<div class="download-btn">
								<a :href="getHREF('logos', image)" title="View" target="_blank">
									<i class="far fa-eye position-absolute"></i>
								</a>
								<a :href="getHREF('logos', image)" :download="getDownload('logos', image)" title="Download" target="_blank">
									<i class="fas fa-download position-absolute"></i>
								</a>
							</div>
						</div>
					</div>
				</div>

				<div v-if="currentPage === 'brochures' && Object.keys(brochures).length > 0">
					<div class="btn-toolbar flex-column mb-3" role="toolbar">
						<div class="btn-group justify-content-center">
							<button class="btn btn-outline-primary brochures-filter-group active" data-filter="*">All</button>
						</div>
					</div>
					<div class="d-flex flex-wrap">
						<div class="position-relative brochures-grid img-container" v-for="image in brochures">
							<img class="brochures-grid-item brochures" :src="getSrc(image)" :srcset="getSrcSet(image)" alt="" />
							<div class="download-btn">
								<a :href="getHREF('brochures', image)" title="View" target="_blank">
									<i class="far fa-eye position-absolute"></i>
								</a>
								<a :href="getHREF('brochures', image)" :download="getDownload('brochures', image)" title="Download" target="_blank">
									<i class="fas fa-download position-absolute"></i>
								</a>
							</div>
						</div>
					</div>
				</div>

				<div v-if="currentPage === 'flyer-chase' && Object.keys(flyerchase).length > 0">
					<div class="btn-toolbar flex-column mb-3" role="toolbar">
						<div class="btn-group justify-content-center">
							<button class="btn btn-outline-primary flyer-chase-filter-group active" data-filter="*">All</button>
							<!-- <button class="btn btn-outline-primary flyer-chase-filter-group" data-filter=".arctic-white">Arctic White</button> -->
							<!-- <button class="btn btn-outline-primary flyer-chase-filter-group" data-filter=".midnight-black">Midnight Black</button> -->
							<!-- <button class="btn btn-outline-primary flyer-chase-filter-group" data-filter=".red-blaze">Red Blaze</button> -->
							<!-- <button class="btn btn-outline-primary flyer-chase-filter-group" data-filter=".charcoal-storm">Charcoal Storm</button> -->
							<button class="btn btn-outline-primary flyer-chase-filter-group" data-filter=".silver-moon">Silver Moon</button>
							<!-- <button class="btn btn-outline-primary flyer-chase-filter-group" data-filter=".interior">Interior</button> -->
						</div>
					</div>
					<div class="d-flex flex-wrap">
						<div class="position-relative flyer-chase-grid img-container" v-for="image in flyerchase['silver-moon']">
							<img class="flyer-chase-grid-item silver-moon" :src="getSrc(image)" :srcset="getSrcSet(image)" alt="" />
							<div class="download-btn">
								<a :href="getHREF('flyer-chase', image)" title="View" target="_blank">
									<i class="far fa-eye position-absolute"></i>
								</a>
								<a :href="getHREF('flyer-chase', image)" :download="getDownload('flyer-chase', image)" title="Download" target="_blank">
									<i class="fas fa-download position-absolute"></i>
								</a>
							</div>
						</div>
					</div>
				</div>

				<div v-if="currentPage === 'flyer-pursue' && Object.keys(flyerpursue).length > 0">
					<div class="btn-toolbar flex-column mb-3" role="toolbar">
						<div class="btn-group justify-content-center">
							<button class="btn btn-outline-primary flyer-pursue-filter-group active" data-filter="*">All</button>
							<!-- <button class="btn btn-outline-primary flyer-pursue-filter-group" data-filter=".arctic-white">Arctic White</button> -->
							<!-- <button class="btn btn-outline-primary flyer-pursue-filter-group" data-filter=".midnight-black">Midnight Black</button> -->
							<!-- <button class="btn btn-outline-primary flyer-pursue-filter-group" data-filter=".red-blaze">Red Blaze</button> -->
							<!-- <button class="btn btn-outline-primary flyer-pursue-filter-group" data-filter=".charcoal-storm">Charcoal Storm</button> -->
							<button class="btn btn-outline-primary flyer-pursue-filter-group" data-filter=".silver-moon">Silver Moon</button>
							<!-- <button class="btn btn-outline-primary flyer-pursue-filter-group" data-filter=".interior">Interior</button> -->
						</div>
					</div>
					<div class="d-flex flex-wrap">
						<div class="position-relative flyer-pursue-grid img-container" v-for="image in flyerpursue['silver-moon']">
							<img class="flyer-pursue-grid-item silver-moon" :src="getSrc(image)" :srcset="getSrcSet(image)" alt="" />
							<div class="download-btn">
								<a :href="getHREF('flyer-pursue', image)" title="View" target="_blank">
									<i class="far fa-eye position-absolute"></i>
								</a>
								<a :href="getHREF('flyer-pursue', image)" :download="getDownload('flyer-pursue', image)" title="Download" target="_blank">
									<i class="fas fa-download position-absolute"></i>
								</a>
							</div>
						</div>
					</div>
				</div>

				<div v-if="currentPage === 'flyer-explore' && Object.keys(flyerexplore).length > 0">
					<div class="btn-toolbar flex-column mb-3" role="toolbar">
						<div class="btn-group justify-content-center">
							<button class="btn btn-outline-primary flyer-explore-filter-group active" data-filter="*">All</button>
							<button class="btn btn-outline-primary flyer-explore-filter-group" data-filter=".arctic-white">Arctic White</button>
							<!-- <button class="btn btn-outline-primary flyer-explore-filter-group" data-filter=".midnight-black">Midnight Black</button> -->
							<!-- <button class="btn btn-outline-primary flyer-explore-filter-group" data-filter=".red-blaze">Red Blaze</button> -->
							<!-- <button class="btn btn-outline-primary flyer-explore-filter-group" data-filter=".charcoal-storm">Charcoal Storm</button> -->
							<!-- <button class="btn btn-outline-primary flyer-explore-filter-group" data-filter=".silver-moon">Silver Moon</button> -->
							<!-- <button class="btn btn-outline-primary flyer-explore-filter-group" data-filter=".interior">Interior</button> -->
						</div>
					</div>
					<div class="d-flex flex-wrap">
						<div class="position-relative flyer-explore-grid img-container" v-for="image in flyerexplore['arctic-white']">
							<img class="flyer-explore-grid-item arctic-white" :src="getSrc(image)" :srcset="getSrcSet(image)" alt="" />
							<div class="download-btn">
								<a :href="getHREF('flyer-explore', image)" title="View" target="_blank">
									<i class="far fa-eye position-absolute"></i>
								</a>
								<a :href="getHREF('flyer-explore', image)" :download="getDownload('flyer-explore', image)" title="Download" target="_blank">
									<i class="fas fa-download position-absolute"></i>
								</a>
							</div>
						</div>
					</div>
				</div>

				<div v-if="currentPage === 'luna-lite' && Object.keys(lunalite).length > 0">
					<div class="btn-toolbar flex-column mb-3" role="toolbar">
						<div class="btn-group justify-content-center">
							<button class="btn btn-outline-primary luna-lite-filter-group active" data-filter="*">All</button>
							<button class="btn btn-outline-primary luna-lite-filter-group" data-filter=".asteroid-silver">Asteroid Silver</button>
							<button class="btn btn-outline-primary luna-lite-filter-group" data-filter=".space-blue">Space Blue</button>
							<button class="btn btn-outline-primary luna-lite-filter-group" data-filter=".interior">Interior</button>
						</div>
					</div>
					<div class="d-flex flex-wrap">
						<div class="position-relative luna-lite-grid img-container" v-for="image in lunalite['asteroid-silver']">
							<img class="luna-lite-grid-item asteroid-silver" :src="getSrc(image)" :srcset="getSrcSet(image)" alt="" />
							<div class="download-btn">
								<a :href="getHREF('luna-lite', image)" title="View" target="_blank">
									<i class="far fa-eye position-absolute"></i>
								</a>
								<a :href="getHREF('luna-lite', image)" :download="getDownload('luna-lite', image)" title="Download" target="_blank">
									<i class="fas fa-download position-absolute"></i>
								</a>
							</div>
						</div>
					</div>
					<div class="d-flex flex-wrap">
						<div class="position-relative luna-lite-grid img-container" v-for="image in lunalite['space-blue']">
							<img class="luna-lite-grid-item space-blue" :src="getSrc(image)" :srcset="getSrcSet(image)" alt="" />
							<div class="download-btn">
								<a :href="getHREF('luna-lite', image)" title="View" target="_blank">
									<i class="far fa-eye position-absolute"></i>
								</a>
								<a :href="getHREF('luna-lite', image)" :download="getDownload('luna-lite', image)" title="Download" target="_blank">
									<i class="fas fa-download position-absolute"></i>
								</a>
							</div>
						</div>
					</div>
					<div class="d-flex flex-wrap">
						<div class="position-relative luna-lite-grid img-container" v-for="image in lunalite['interior']">
							<img class="luna-lite-grid-item interior" :src="getSrc(image)" :srcset="getSrcSet(image)" alt="" />
							<div class="download-btn">
								<a :href="getHREF('luna-lite', image)" title="View" target="_blank">
									<i class="far fa-eye position-absolute"></i>
								</a>
								<a :href="getHREF('luna-lite', image)" :download="getDownload('luna-lite', image)" title="Download" target="_blank">
									<i class="fas fa-download position-absolute"></i>
								</a>
							</div>
						</div>
					</div>
				</div>

				<div v-if="currentPage === 'luna-rover' && Object.keys(lunarover).length > 0">
					<div class="btn-toolbar flex-column mb-3" role="toolbar">
						<div class="btn-group justify-content-center">
							<button class="btn btn-outline-primary luna-rover-filter-group active" data-filter="*">All</button>
							<button class="btn btn-outline-primary luna-rover-filter-group" data-filter=".rocket-red">Rocket Red</button>
							<button class="btn btn-outline-primary luna-rover-filter-group" data-filter=".asteroid-silver">Asteroid Silver</button>
							<button class="btn btn-outline-primary luna-rover-filter-group" data-filter=".interior">Interior</button>
						</div>
					</div>
					<div class="d-flex flex-wrap">
						<div class="position-relative luna-rover-grid img-container" v-for="image in lunarover['rocket-red']">
							<img class="luna-rover-grid-item rocket-red" :src="getSrc(image)" :srcset="getSrcSet(image)" alt="" />
							<div class="download-btn">
								<a :href="getHREF('luna-rover', image)" title="View" target="_blank">
									<i class="far fa-eye position-absolute"></i>
								</a>
								<a :href="getHREF('luna-rover', image)" :download="getDownload('luna-rover', image)" title="Download" target="_blank">
									<i class="fas fa-download position-absolute"></i>
								</a>
							</div>
						</div>
					</div>
					<div class="d-flex flex-wrap">
						<div class="position-relative luna-rover-grid img-container" v-for="image in lunarover['asteroid-silver']">
							<img class="luna-rover-grid-item asteroid-silver" :src="getSrc(image)" :srcset="getSrcSet(image)" alt="" />
							<div class="download-btn">
								<a :href="getHREF('luna-rover', image)" title="View" target="_blank">
									<i class="far fa-eye position-absolute"></i>
								</a>
								<a :href="getHREF('luna-rover', image)" :download="getDownload('luna-rover', image)" title="Download" target="_blank">
									<i class="fas fa-download position-absolute"></i>
								</a>
							</div>
						</div>
					</div>
					<div class="d-flex flex-wrap">
						<div class="position-relative luna-grid img-container" v-for="image in lunarover['interior']">
							<img class="luna-rover-grid-item interior" :src="getSrc(image)" :srcset="getSrcSet(image)" alt="" />
							<div class="download-btn">
								<a :href="getHREF('luna-rover', image)" title="View" target="_blank">
									<i class="far fa-eye position-absolute"></i>
								</a>
								<a :href="getHREF('luna-rover', image)" :download="getDownload('luna-rover', image)" title="Download" target="_blank">
									<i class="fas fa-download position-absolute"></i>
								</a>
							</div>
						</div>
					</div>
				</div>

				<div v-if="currentPage === 'luna' && Object.keys(luna).length > 0">
					<div class="btn-toolbar flex-column mb-3" role="toolbar">
						<div class="btn-group justify-content-center">
							<button class="btn btn-outline-primary luna-filter-group active" data-filter="*">All</button>
							<button class="btn btn-outline-primary luna-filter-group" data-filter=".silver-mine">Silver Mine</button>
							<button class="btn btn-outline-primary luna-filter-group" data-filter=".sunburst-orange">Sunburst Orange</button>
							<button class="btn btn-outline-primary luna-filter-group" data-filter=".electric-blue">Electric Blue</button>
							<button class="btn btn-outline-primary luna-filter-group" data-filter=".mediterranean-blue">Mediterranean Blue</button>
							<button class="btn btn-outline-primary luna-filter-group" data-filter=".interior">Interior</button>
						</div>
					</div>
					<div class="d-flex flex-wrap">
						<div class="position-relative luna-grid img-container" v-for="image in luna['silver-mine']">
							<img class="luna-grid-item silver-mine" :src="getSrc(image)" :srcset="getSrcSet(image)" alt="" />
							<div class="download-btn">
								<a :href="getHREF('luna', image)" title="View" target="_blank">
									<i class="far fa-eye position-absolute"></i>
								</a>
								<a :href="getHREF('luna', image)" :download="getDownload('luna', image)" title="Download" target="_blank">
									<i class="fas fa-download position-absolute"></i>
								</a>
							</div>
						</div>
					</div>
					<div class="d-flex flex-wrap">
						<div class="position-relative luna-grid img-container" v-for="image in luna['sunburst-orange']">
							<img class="luna-grid-item sunburst-orange" :src="getSrc(image)" :srcset="getSrcSet(image)" alt="" />
							<div class="download-btn">
								<a :href="getHREF('luna', image)" title="View" target="_blank">
									<i class="far fa-eye position-absolute"></i>
								</a>
								<a :href="getHREF('luna', image)" :download="getDownload('luna', image)" title="Download" target="_blank">
									<i class="fas fa-download position-absolute"></i>
								</a>
							</div>
						</div>
					</div>
					<div class="d-flex flex-wrap">
						<div class="position-relative luna-grid img-container" v-for="image in luna['electric-blue']">
							<img class="luna-grid-item electric-blue" :src="getSrc(image)" :srcset="getSrcSet(image)" alt="" />
							<div class="download-btn">
								<a :href="getHREF('luna', image)" title="View" target="_blank">
									<i class="far fa-eye position-absolute"></i>
								</a>
								<a :href="getHREF('luna', image)" :download="getDownload('luna', image)" title="Download" target="_blank">
									<i class="fas fa-download position-absolute"></i>
								</a>
							</div>
						</div>
					</div>
					<div class="d-flex flex-wrap">
						<div class="position-relative luna-grid img-container" v-for="image in luna['mediterranean-blue']">
							<img class="luna-grid-item mediterranean-blue" :src="getSrc(image)" :srcset="getSrcSet(image)" alt="" />
							<div class="download-btn">
								<a :href="getHREF('luna', image)" title="View" target="_blank">
									<i class="far fa-eye position-absolute"></i>
								</a>
								<a :href="getHREF('luna', image)" :download="getDownload('luna', image)" title="Download" target="_blank">
									<i class="fas fa-download position-absolute"></i>
								</a>
							</div>
						</div>
					</div>
					<div class="d-flex flex-wrap">
						<div class="position-relative luna-grid img-container" v-for="image in luna['interior']">
							<img class="luna-grid-item interior" :src="getSrc(image)" :srcset="getSrcSet(image)" alt="" />
							<div class="download-btn">
								<a :href="getHREF('luna', image)" title="View" target="_blank">
									<i class="far fa-eye position-absolute"></i>
								</a>
								<a :href="getHREF('luna', image)" :download="getDownload('luna', image)" title="Download" target="_blank">
									<i class="fas fa-download position-absolute"></i>
								</a>
							</div>
						</div>
					</div>
				</div>

				<div v-if="currentPage === 'sol' && Object.keys(sol).length > 0">
					<div class="btn-toolbar flex-column mb-3" role="toolbar">
						<div class="btn-group justify-content-center">
							<button class="btn btn-outline-primary sol-filter-group active" data-filter="*">All</button>
							<button class="btn btn-outline-primary sol-filter-group" data-filter=".silver-mine">Silver Mine</button>
							<button class="btn btn-outline-primary sol-filter-group" data-filter=".electric-blue">Electric Blue</button>
							<button class="btn btn-outline-primary sol-filter-group" data-filter=".gold-dust">Gold Dust</button>
							<button class="btn btn-outline-primary sol-filter-group" data-filter=".interior">Interior</button>
						</div>
					</div>
					<div class="d-flex flex-wrap">
						<div class="position-relative sol-grid img-container" v-for="image in sol['silver-mine']">
							<img class="sol-grid-item silver-mine" :src="getSrc(image)" :srcset="getSrcSet(image)" alt="" />
							<div class="download-btn">
								<a :href="getHREF('sol', image)" title="View" target="_blank">
									<i class="far fa-eye position-absolute"></i>
								</a>
								<a :href="getHREF('sol', image)" :download="getDownload('sol', image)" title="Download" target="_blank">
									<i class="fas fa-download position-absolute"></i>
								</a>
							</div>
						</div>
					</div>
					<div class="d-flex flex-wrap">
						<div class="position-relative sol-grid img-container" v-for="image in sol['electric-blue']">
							<img class="sol-grid-item electric-blue" :src="getSrc(image)" :srcset="getSrcSet(image)" alt="" />
							<div class="download-btn">
								<a :href="getHREF('sol', image)" title="View" target="_blank">
									<i class="far fa-eye position-absolute"></i>
								</a>
								<a :href="getHREF('sol', image)" :download="getDownload('sol', image)" title="Download" target="_blank">
									<i class="fas fa-download position-absolute"></i>
								</a>
							</div>
						</div>
					</div>
					<div class="d-flex flex-wrap">
						<div class="position-relative sol-grid img-container" v-for="image in sol['gold-dust']">
							<img class="sol-grid-item gold-dust" :src="getSrc(image)" :srcset="getSrcSet(image)" alt="" />
							<div class="download-btn">
								<a :href="getHREF('sol', image)" title="View" target="_blank">
									<i class="far fa-eye position-absolute"></i>
								</a>
								<a :href="getHREF('sol', image)" :download="getDownload('sol', image)" title="Download" target="_blank">
									<i class="fas fa-download position-absolute"></i>
								</a>
							</div>
						</div>
					</div>
					<div class="d-flex flex-wrap">
						<div class="position-relative sol-grid img-container" v-for="image in sol.interior">
							<img class="sol-grid-item interior" :src="getSrc(image)" :srcset="getSrcSet(image)" alt="" />
							<div class="download-btn">
								<a :href="getHREF('sol', image)" title="View" target="_blank">
									<i class="far fa-eye position-absolute"></i>
								</a>
								<a :href="getHREF('sol', image)" :download="getDownload('sol', image)" title="Download" target="_blank">
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
				logos: [],
				brochures: [],
				flyerchase: [],
				flyerpursue: [],
				flyerexplore: [],
				lunalite: [],
				lunarover: [],
				luna: [],
				sol: [],
				currentPage: '',
			};
		},

		mounted() {
			this.currentPage = this.page;
			this.changeActiveState();
			this.getContent(this.currentPage);
		},

		methods: {
			changeActiveState() {
				var self = this;
				$(document).ready(function() {
					$("."+window.location.href.split('/').pop()).addClass('active');
					$("#marketing.nav-pills .nav-link").click(function() {
						$(this).addClass("active").siblings().removeClass("active");
						var link = $(this).text().toLowerCase().replace(" ", "-");
						self.currentPage = link;
						self.getContent(link);
					});
				});
			},

			getContent(link) {
				// Change the URL to this link...
				history.pushState({}, null, link);

				if (link === 'flyer-chase' || link === 'flyer-pursue' || link === 'flyer-explore' || link === 'luna-lite' || link === 'luna-rover') {
					var linkVar = link.replace('-', '');
				} else {
					var linkVar = link;
				}

				axios.get('/api/marketing-materials/'+link)
					.then(response => {
						if (response.status === 200) {
							this[linkVar] = response.data;
							this.loadItem(link);
						}
					});
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

			getHREF(type, img) {
				if (type === 'brochures') {
					return '/' + img.replace('thumbs/', '').replace('.jpg', '.pdf');
				}

				return '/' + img.replace('thumbs/', '');
			},

			getSrc(img) {
				return '/' + img;
			},

			getSrcSet(img) {
				return '/' + img + ' 1x, ' + '/' + img.replace('thumbs/', 'thumbs/@2x/') + ' 2x';
			},

			getDownload(type, img) {
				if (type === 'brochures') {
					return img.split('/').pop().replace('.jpg', '.pdf');
				}

				return img.split('/').pop();
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
