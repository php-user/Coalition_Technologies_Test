<template>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h3 class="mb-4">Create product</h3>

                <form @submit.prevent="formSubmit">
                    <div class="form-group">
                        <label for="name">Product Name</label>
                        <input type="text" class="form-control" id="name" v-model="name" required>
                    </div>
                    <div class="form-group">
                        <label for="quantity">Quantity</label>
                        <input type="text" class="form-control" id="quantity" v-model="quantity" required>
                        <small class="text-danger">{{ quantityError }}</small>
                    </div>
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="text" class="form-control" id="price" v-model="price" required>
                        <small class="text-danger">{{ priceError }}</small>
                    </div>
                
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>

            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            route: {
                type: String,
                required: true
            }
        },
        data () {
            return {
                name: '',
                quantity: 0,
                price: 0,
                quantityError: '',
                priceError: ''
            }
        },
        methods: {
            formSubmit () {
                this.quantityError = '';
                this.priceError = '';

                if (this.quantity <= 0) {
                    this.quantityError = 'Quantity must be more then 0';
                }

                if (this.price <= 0) {
                    this.priceError = 'Price must be more then 0';
                }

                if (this.name && this.quantity && this.price) {
                    axios.post(this.route, {
                        name: this.name,
                        quantity: this.quantity,
                        price: this.price,
                    })
                    .then(response => {
                        if (response.data.result) {
                        
                            let products = response.data.result;
                            
                            products = JSON.parse(products);
                            let output = '';

                            products.forEach(product => {
                                
                                output += `
                                    <div class="card shadow mb-4">
                                        <h4 class="card-header">Product:${product.name }</h4>
                                        <div class="card-body">
                                            <div>Quantity: ${product.quantity }</div>
                                            <div>Price: ${product.price }</div>
                                            <div>Total: ${product.total }</div>
                                            <div>Date: ${product.datetime }</div>
                                        </div>
                                    </div>
                                `;
                            });

                            let productsDiv = this.$parent.$refs.products;
                            productsDiv.innerHTML = output;

                            this.name = '';
                            this.quantity = '';
                            this.price = '';
                        }
                    })
                    .catch(error => {
                        // console.log(error);
                    });
                }
            }
        }
    }
</script>
