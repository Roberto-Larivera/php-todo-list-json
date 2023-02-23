const {createApp} = Vue;
console.log('int ok')
createApp({
    data(){
        return{
            readUrl : './php/read.php',
            createUrl : './php/create.php',
            upgradeUrl : './php/upgrade.php',
            deleteUrl : './php/delete.php',
            listTodoApi : [],
        }
    },
    methods: {
        
    },
    created() {
        axios
            .get(this.readUrl)
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