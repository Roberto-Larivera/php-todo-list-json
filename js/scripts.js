const {createApp} = Vue;
console.log('int ok')
createApp({
    data(){
        return{
            apiUrl : './php/api.php',
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
                this.message = response;
            });
    },
}).mount('#app');

// echo '<pre>'; var_dump($data); echo '</pre>'