const {createApp} = Vue;
console.log('int ok')
createApp({
    data(){
        return{
            apiurl : 'http://localhost:8888/boolean/php-todo-list-json/php/api.php',
            message : 'Message da ricevere',
        }
    },
    methods: {
        
    },
    created() {
        console.log(axios)
        axios
            .get(this.apiUrl)
            .then((response) => {
                console.log(response);
                this.message = response.data;
            });
    },
}).mount('#app');