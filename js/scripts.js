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
            newTodoForm : {
                textTodo : '',
                doneTodo : false
            },
        };
    },
    methods: {
        getReadApi(){
            axios
            .get(this.readUrl)
            .then((response) => {
                this.listTodoApi = response.data.data;
                console.log(response.data.data);
                
            });
        },
        postCreateApi(){
            axios
                .post(this.createUrl, {
                    reason: 'Create todo',
                    newTodo: this.newTodoForm
                },{
                    headers:{
                        'Content-Type': 'multipart/form-data',
                    }
                })
                .then((response) => {
                    console.log(response.data.data);
                    this.newTodoForm.textTodo = '';
                    this.getReadApi();
                });
        },
        postUpgradeDoneApi(item, index){
            axios
                .post(this.upgradeUrl, {
                    reason: 'Upgrade done',
                    upgradeTodoIndex:index,
                    upgradeTodo: item
                },{
                    headers:{
                        'Content-Type': 'multipart/form-data',
                    }
                })
                .then((response) => {
                    console.log(response.data);
                    this.getReadApi();
                });
        },
        postDeleteApi(item, index){
            axios
                .post(this.deleteUrl, {
                    reason: 'Delete todo',
                    deleteTodoIndex:index,
                    deleteTodo: item
                },{
                    headers:{
                        'Content-Type': 'multipart/form-data',
                    }
                })
                .then((response) => {
                    console.log(response.data);
                    this.getReadApi();
                });
        },
    },
    created() {
        this.getReadApi()
    },
    mounted() {
        console.log(this.listTodoApi);
    },
}).mount('#app');

// echo '<pre>'; var_dump($data); echo '</pre>'