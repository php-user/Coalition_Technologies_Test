<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <form @submit.prevent="formSubmit">
                    <div class="form-group">
                        <label for="name">Product Name</label>
                        <input type="text" class="form-control" id="name" v-model="name">
                    </div>
                    <div class="form-group">
                        <label for="quantity">Quantity</label>
                        <input type="text" class="form-control" id="quantity" v-model="quantity">
                    </div>
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="text" class="form-control" id="price" v-model="price">
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
                price: 0
            }
        },
        methods: {
            formSubmit () {
               

                axios.post(this.route, {
                    name: this.name,
                    quantity: this.quantity,
                    price: this.price,
                })
                .then(response => {
                    if (response) {
                        console.log(response);
                    }
                })
                .catch(error => {
                    // console.log(error);
                });
            }
        }
    }
</script>
