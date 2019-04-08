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
				<div class="row training-grid">
					<div class="col-md-4 mb-4 text-center training-grid-item" v-for="video in currentVideos">
						<h3>{{ video.heading }}</h3>
						<div class="videoWrapper" v-html="video.video_code"></div>
						<clipboard buttonText="Copy Embed code to Clipboard" :copyText="video.embed" flashText="Copied Embed code to Clipboard!"></clipboard>
					</div>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
	export default {
		props: ['videos'],

		data() {
			return {
				currentVideos: [],
			};
		},

		created() {
			this.currentVideos = this.videos;
			this.changeActiveState();
		},

		methods: {
			changeActiveState() {
				var self = this;
				$(document).ready(function() {
					$("."+window.location.href.split('/').pop()).addClass('active');
					$(".btn-outline-primary").click(function() {
						$(this).addClass("active").siblings().removeClass("active");
						var link = this.innerHTML.toLowerCase().replace(" ", "-");
						self.getVideos(link);
					});
				});
			},

			getVideos(link) {
				// Change the URL to this link...
				history.pushState({}, null, link);

				axios.get('/api/training-videos/'+link)
					.then(response => {
						if (response.status === 200) {
							this.currentVideos = response.data;
						}
					});
			}
		}
	}
</script>
