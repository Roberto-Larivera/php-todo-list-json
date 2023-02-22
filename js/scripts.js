const {createApp} = Vue;
console.log('int ok')
createApp({
    data(){
        return{
            apiUrl : './php/api.php',
            listTodoApi : [],
        }
    },
    methods: {
        
    },
    created() {
        axios
            .get(this.apiUrl)
            .then((response) => {
                this.listTodoApi = response.data.data;
                console.log(response.data.data);
                
            });
    },
    mounted() {
        console.log(this.listTodoApi);
    },
}).mount('#app');

// echo '<pre>'; var_dump($data); echo '</pre>'