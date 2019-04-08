<template>
	<div>
		<h1>{{ productName }}</h1>
		<div class="flex-wrap mb-3" v-show="Object.keys(manuals).length > 0">
			<h2 class="header">Manuals</h2>
			<div class="d-inline-flex position-relative img-container mr-3" v-for="manual in manuals">
				<figure class="figure m-0">
					<img class="trouble-shooting-manual" :src="manualsSRC(manual.pdf_image)" width="150" />
					<figcaption class="figure-caption text-center pt-2">{{ getCaption(manual.pdf_name) }}</figcaption>
				</figure>
				<div class="download-btn">
					<a :href="getHREF(manual.pdf)" title="View" target="_blank">
						<i class="far fa-eye position-absolute"></i>
					</a>
					<a :href="getHREF(manual.pdf)" :download="manual.pdf" title="Download" target="_blank">
						<i class="fas fa-download position-absolute"></i>
					</a>
				</div>
			</div>
		</div>
		<div v-show="Object.keys(videos).length > 0">
			<h2 class="header">Trouble Shooting Videos</h2>
			<div class="row">
				<div class="col-md-6 mb-3" v-for="video in videos">
					<div class="videoWrapper" v-html="checkVideoType(video.video_code)"></div>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
	export default {
		props: ['productName', 'manuals', 'videos'],

		methods: {
			manualsSRC(img) {
				if (img !== null) {
					return '/storage/pdf_images/'+img;
				}
			},

			getHREF(pdf) {
				if (pdf !== null) {
					return '/storage/'+pdf;
				}
			},

			getCaption(title) {
				if (title !== null) {
					var newTitle = title.replace('.pdf', '').replace('.PDF', '');
					if (newTitle.length > 15) {
						return newTitle.substring(0, 15)+'...';
					}

					return newTitle;
				}
			},

			getLinkTitle(title) {
				if (title !== null) {
					return title.replace('.pdf', '').replace('.PDF', '');
				}
			},

			checkVideoType(video) {
				if (video !== null) {
					if (video.substring(1, 7) !== 'iframe') {
						return '<iframe width="560" height="315" src="'+video+'"></iframe>';
					}

					return video;
				}
			}
		}
	}
</script>
