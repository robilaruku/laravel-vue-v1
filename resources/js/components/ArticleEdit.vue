<template>
  <div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Edit Article
                </div>
                <div class="card-body">
                    <div class="alert alert-danger" role="alert" v-if="errors.lenght">
                        <b>Terdapat kesalahan dalam input :</b>
                        <ul>
                            <li v-for="error in errors" :key="error">{{ error }}</li>
                        </ul>
                    </div>
                    <form @submit.prevent="updateAricle">
                        <div class="form-group">
                            <label htmlFor="title">Title</label>
                            <input  class="form-control" type="text" id="title" v-model="article.title">
                        </div>
                        <div class="form-group">
                            <label htmlFor="content">Content</label>
                            <textarea id="content" class="form-control" v-model="article.content"></textarea>
                        </div>
                         <div class='form-group'>
                                <router-link :to="{ name: 'home' }" class="btn btn-secondary">Back</router-link>
                                <button class='btn btn-primary'>Update</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
  </div>
</template>
<script>
export default {
    data(){
        return {
            article : {},
            errors : [],
            title : null,
            content : null,
        }
    },
    created(){
        let uri = `/api/articles/edit/${this.$route.params.id}`;
        this.axios.get(uri).then((response) => {
            this.article = response.data;
        });
    },
    methods: {
        updateAricle(e){
            if (this.$data.article.title !=null && this.$data.article.content !=null) {
                this.$swal.fire({
                    title : 'success',
                    text : 'Article has been updated',
                    icon : 'success',
                    timer : 1000
                });
                let uri = `/api/articles/update/${this.$route.params.id}`;
                this.axios.put(uri, this.article).then((response) => {
                    this.$router.push({name : 'home'});
                });
                return true;
            }

            this.erros = [];

            if (!this.$data.article.title) {
                this.errors.push('Title wajib diisi !');
            }

            if (!this.$data.article.content) {
                this.errors.push('Content wajib diisi !');
            }

            e.perventDefault();
        }
    }
}
</script>
