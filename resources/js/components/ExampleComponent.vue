<template>
    <div>
        <div class="bg-gray-50">
            <div
                class="max-w-screen-xl mx-auto py-12 px-4 sm:px-6 lg:py-16 lg:px-8 lg:flex lg:items-center lg:justify-between">
                <h2 class="text-3xl leading-9 font-extrabold tracking-tight text-gray-900 sm:text-4xl sm:leading-10">
                    Laravel / Vue.js / Axios / Tailwind / Toastr
                    <br>
                    <span class="text-indigo-600">Simple, one page, blogging template!</span>
                </h2>
                <div class="mt-8 flex lg:flex-shrink-0 lg:mt-0">
                    <div class="inline-flex rounded-md shadow">
                        <a href="#" @click.prevent="loadPopup()"
                           class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base leading-6 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:shadow-outline transition duration-150 ease-in-out">
                            New Post
                        </a>
                    </div>
                </div>
            </div>
            <div v-if="modalShown" class="fixed z-10 inset-0 overflow-y-auto">
                <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                    <!--
                      Background overlay, show/hide based on modal state.

                      Entering: "ease-out duration-300"
                        From: "opacity-0"
                        To: "opacity-100"
                      Leaving: "ease-in duration-200"
                        From: "opacity-100"
                        To: "opacity-0"
                    -->
                    <div class="fixed inset-0 transition-opacity">
                        <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                    </div>

                    <!-- This element is to trick the browser into centering the modal contents. -->
                    <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>&#8203;
                    <!--
                      Modal panel, show/hide based on modal state.

                      Entering: "ease-out duration-300"
                        From: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                        To: "opacity-100 translate-y-0 sm:scale-100"
                      Leaving: "ease-in duration-200"
                        From: "opacity-100 translate-y-0 sm:scale-100"
                        To: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                    -->
                    <div
                        class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
                        role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                            <form @submit.prevent="postSubmit()">
                                <input type="hidden" name="remember" value="true">
                                <div class="rounded-md shadow-sm">
                                    <div>
                                        <input v-model="newTitle" name="title" aria-label="Email address" type="email"
                                               required
                                               class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:shadow-outline-blue focus:border-blue-300 focus:z-10 sm:text-sm sm:leading-5"
                                        >
                                    </div>
                                    <div class=" mt-5">
                                        <textarea v-model="newBody" name="body"
                                                  class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:shadow-outline-blue focus:border-blue-300 focus:z-10 sm:text-sm sm:leading-5"></textarea>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                        <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                          <button v-if="isEditing" @click.prevent="postUpdateSubmit(id)" type="button"
                                  class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-indigo-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-indigo-500 focus:outline-none focus:border-red-700 focus:shadow-outline-red transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                            Submit
                          </button>
                            <button v-else @click.prevent="postSubmit()" type="button"
                                  class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-indigo-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-indigo-500 focus:outline-none focus:border-red-700 focus:shadow-outline-red transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                            Submit
                          </button>
                        </span>
                            <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">
                          <button @click.prevent="loadPopup()" type="button"
                                  class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-white text-base leading-6 font-medium text-gray-700 shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                            Cancel
                          </button>
                        </span>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!--posts-->
        <div class="container mx-auto mt-10 px-5">
            <div class="flex mb-4">
                <h6 class="mt-2 leading-8 font-bold tracking-tight text-gray-500 sm:leading-10">
                    Total posts: {{ laravelData.total }}
                </h6>
            </div>
            <dl>
                <template v-for="post in laravelData.data">
                    <div class="bg-white shadow overflow-hidden sm:rounded-lg mb-5">
                        <div class="px-4 py-5 border-b border-gray-200 sm:px-6">
                            <h3 class="text-lg leading-6 font-medium text-gray-900">
                                {{ post.title }}
                            </h3>
                        </div>
                        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                                {{ post.body }}
                            </dd>
                        </div>
                        <hr>
                    </div>
                    <button @click.prevent="postUpdate(post.id)" type="button"
                            class="inline-flex mb-6 justify-center mx-auto w-1/4 rounded-md border border-transparent px-4 py-2 bg-indigo-400 text-base leading-6 font-medium text-white shadow-sm hover:bg-indigo-500 focus:outline-none focus:border-red-700 focus:shadow-outline-red transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                        Edit
                    </button>
                    <button @click.prevent="postDelete(post.id)" type="button"
                            class="inline-flex mb-6 justify-center mx-auto w-1/4 rounded-md border border-transparent px-4 py-2 bg-orange-400 text-base leading-6 font-medium text-white shadow-sm hover:bg-orange-500 focus:outline-none focus:border-red-700 focus:shadow-outline-red transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                        Delete
                    </button>
                </template>
                <pagination class="pagination" :data="laravelData" @pagination-change-page="getResults"></pagination>

            </dl>
        </div>

    </div>
    <!-- end of posts-->
    </div>
</template>

<script>
export default {

    data() {
        return {
            modalShown: false,
            laravelData: {},
            newTitle: '',
            newBody: '',
            isEditing: false,
        }
    },

    created() {
        this.getResults();
    },
    methods: {
        getResults(page) {
            if (typeof page === 'undefined') {
                page = 1;
            }
            axios.get('./api/posts?page=' + page)
                .then(response => {
                    return response;
                }).then(data => {
                this.laravelData = data.data;
            });
        },
        loadPopup() {
            this.modalShown = !this.modalShown
        },
        postSubmit() {
            axios.post('./api/post', {title: this.newTitle, body: this.newBody})
                .then((response) => {
                    this.getResults();
                    this.modalShown = !this.modalShown;
                    this.$toasted.show(response.data.message);
                    this.newTitle = '';
                    this.newBody = '';

                });
        },
        postDelete(id) {
            axios.post('./api/post/' + id, {_method: 'delete'})
                .then((response) => {
                    this.getResults();
                    this.$toasted.show(response.data.message)

                });
        },
        postUpdate(id) {
            this.modalShown = !this.modalShown;
            this.isEditing = !this.isEditing;
            axios.get('./api/post/show/' + id)
                .then(response => {
                    return response;
                }).then(data => {
                this.newTitle = data.data.title;
                this.newBody = data.data.body;
                this.id = data.data.id
            });

        },
        postUpdateSubmit(id) {
            axios.post('./api/post/edit/' + id, {title: this.newTitle, body: this.newBody, _method: 'patch'})
                .then(response => {
                    return response;
                }).then(data => {
                this.newTitle = '';
                this.newBody = '';
                this.$toasted.show(data.data.message);
                this.isEditing = false;

            })
            this.getResults();
            this.modalShown = !this.modalShown;


        }
    }
}
</script>
