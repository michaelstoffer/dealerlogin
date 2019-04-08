<template>
	<div>
		<div class="mb-4">
			<div class="row" v-if="modelSelected && categorySelected">
				<div class="col-md-6">
					<select class="form-control" @change="isModelSelected" v-model="model">
						<option :value="[]" selected>Select a Model</option>
						<option :value="model" v-if="model.products.length > 0" v-for="model in selectedModels">{{ model.name }}</option>
					</select>
				</div>
				<div class="col-md-6">
					<select class="form-control" @change="isCategorySelected" v-model="category">
						<option :value="[]" selected>Select a Category</option>
						<option :value="category" v-if="category.products.length > 0" v-for="category in selectedCategories">{{ category.name }}</option>
					</select>
				</div>
			</div>

			<div class="row" v-if="!modelSelected && categorySelected">
				<div class="col-md-6">
					<select class="form-control" @change="isModelSelected" v-model="model">
						<option :value="[]" selected>Select a Model</option>
						<option :value="model" v-if="model.products.length > 0" v-for="model in selectedModels">{{ model.name }}</option>
					</select>
				</div>
				<div class="col-md-6">
					<select class="form-control" @change="isCategorySelected" v-model="category">
						<option :value="[]" selected>Select a Category</option>
						<option :value="category" v-if="category.products.length > 0" v-for="category in allCategories">{{ category.name }}</option>
					</select>
				</div>
			</div>

			<div class="row" v-if="!categorySelected && modelSelected">
				<div class="col-md-6">
					<select class="form-control" @change="isModelSelected" v-model="model">
						<option :value="[]" selected>Select a Model</option>
						<option :value="model" v-if="model.products.length > 0" v-for="model in allModels">{{ model.name }}</option>
					</select>
				</div>
				<div class="col-md-6">
					<select class="form-control" @change="isCategorySelected" v-model="category">
						<option :value="[]" selected>Select a Category</option>
						<option :value="category" v-if="category.products.length > 0" v-for="category in selectedCategories">{{ category.name }}</option>
					</select>
				</div>
			</div>

			<div class="row" v-if="!categorySelected && !modelSelected">
				<div class="col-md-6">
					<select class="form-control" @change="isModelSelected" v-model="model">
						<option :value="[]" selected>Select a Model</option>
						<option :value="model" v-if="model.products.length > 0" v-for="model in allModels">{{ model.name }}</option>
					</select>
				</div>
				<div class="col-md-6">
					<select class="form-control" @change="isCategorySelected" v-model="category">
						<option :value="[]" selected>Select a Category</option>
						<option :value="category" v-if="category.products.length > 0" v-for="category in allCategories">{{ category.name }}</option>
					</select>
				</div>
			</div>
		</div>
		<div class="mt-3 mb-3" v-if="Object.keys(products).length > 0" >
			<h1>Products</h1>
			<div class="row">
				<div class="col-md-3 p-2" v-for="product in products">
					<button class="btn btn-link" @click="setProduct(product)">{{ product.name }}</button>
				</div>
			</div>
		</div>
		<manualsVideos v-if="productSelected" :productName="productName" :manuals="productManuals" :videos="productVideos"></manualsVideos>
	</div>
</template>

<script>
	import manualsVideos from './ManualsVideos.vue';

	export default {
		props: ['models', 'categories'],
		components: { manualsVideos },

		data() {
			return {
				productName: '',
				model: [],
				category: [],
				products: [],
				modelProducts: [],
				productVideos: [],
				productManuals: [],
				categoryProducts: [],
				selectedModels: [],
				selectedCategories: [],
				modelSelected: false,
				productSelected: false,
				categorySelected: false,
				allModels: this.models,
				allCategories: this.categories
			};
		},

		methods: {
			isModelSelected() {
				if (Object.keys(this.model).length > 0) {
					this.modelProducts = this.model.products;
					this.selectedCategories = [];

					for (var i = 0; i < this.model.categories.length; i++) {
						for (var j = 0 ; j < this.allCategories.length; j++) {
							if (this.allCategories[j].id === this.model.categories[i].category_id) {
								this.selectedCategories.push(this.allCategories[j]);
							}
						}
					}
				} else {
					this.modelProducts = [];
				}
				this.getProducts();
				this.modelSelected = Object.keys(this.model).length > 0 ? true : false;
			},

			isCategorySelected() {
				if (Object.keys(this.category).length > 0) {
					this.categoryProducts = this.category.products;
					this.selectedModels = [];

					for (var i = 0; i < this.category.models.length; i++) {
						for (var j = 0 ; j < this.allModels.length; j++) {
							if (this.allModels[j].id === this.category.models[i].model_id) {
								this.selectedModels.push(this.allModels[j]);
							}
						}
					}
				} else {
					this.categoryProducts = [];
				}
				this.getProducts();
				this.categorySelected = Object.keys(this.category).length > 0 ? true : false;
			},

			clearProduct() {
				this.productSelected = false;
				this.productManuals = [];
				this.productVideos = [];
				this.productName = '';
			},

			getProducts() {
				if (Object.keys(this.modelProducts).length > 0 && Object.keys(this.categoryProducts).length > 0) {
					this.products = this.modelProducts.concat(this.categoryProducts);
				} else if (Object.keys(this.modelProducts).length > 0 && Object.keys(this.categoryProducts).length < 1) {
					this.products = this.modelProducts;
				} else if (Object.keys(this.modelProducts).length < 1 && Object.keys(this.categoryProducts).length > 0) {
					this.products = this.categoryProducts;
				}

				var obj = {};
				for ( var i=0, len=this.products.length; i < len; i++ )
					obj[this.products[i].name] = this.products[i];
				this.products = new Array();
				for ( var key in obj )
					this.products.push(obj[key]);

				this.clearProduct();
			},

			setProduct(product) {
				this.clearProduct();
				this.productManuals = product.manuals;
				this.productVideos = product.videos;
				this.productName = product.name;
				this.productSelected = true;
			}
		}
	}
</script>
