# php-todo-list-json
## PHP ToDo List JSON
<br>

# Giorno 1
## Descrizione
Dobbiamo creare una web-app che permetta di leggere una lista di Todo.
Deve essere anche gestita la persistenza dei dati leggendoli da un file JSON.

## Stack
Html, CSS, VueJS (importato tramite CDN), axios, PHP

## Consigli
Nello svolgere l'esercizio seguite un approccio graduale.
Prima assicuratevi che la vostra pagina index.php (il vostro front-end) riesca a comunicare correttamente con il vostro script PHP (le vostre "API").

Solo a questo punto sarà utile passare alla lettura della lista da un file JSON.

## Bonus
Mostrare lo stato del task → se completato, barrare il testo

## Versione
- Commit 5: Creato html + css da ex progetto: vue-todolist
    - link: "https://github.com/Roberto-Larivera/vue-todolist"

<br>

# Giorno 2
## Descrizione
Partendo dall'esercizio di ieri, aggiungiamo la possibilità di scrivere nella lista di Todo.
Creare un apposito form in cui è possibile aggiungere il testo di un nuovo task. La sottomissione del form verrà inviata ad una nuova pagina che si occuperà di salvare il nuovo task nella lista dei Todo.
Estendiamo la gestione della persistenza dei dati scrivendo le modifiche nel file JSON utilizzato ieri.

## Stack
Html, CSS, VueJS (importato tramite CDN), axios, PHP

## Consigli
Anche oggi, nello svolgere l'esercizio seguite un approccio graduale.
"Testare" l'invio di un nuovo task prima di memorizzare i dati nel file JSON.


## Bonus
1. Permettere di segnare un task come completato facendo click sul testo
2. Permettere il toggle del task (completato/non completato)
3. Abilitare l'eliminazione di un task

## Versione
- Commit 8: Creazione file script per database + databaseBackup;
- Commit 11: Completato script 'create' => 'create.php'. Utilizzato per aggiungere un nuovo todo dentro il database per poi far tornare come risposta la conferma di avvenuta creazione e nel 'data' il riferimento del todo inserito;
- Commit 13: Completato script 'upgrade' => 'upgrade.php'. Utilizzato per modificare il valore del toogle (done) del todo nel database per poi far tonare una risposta di avvenuta modifica e nel 'data' il riferimento del todo modificato;
- Commit 15: Completato script 'delete' => 'delete.php'. Utilizzato per eliminare il todo nel database per poi far tonare una risposta di avvenuta eliminazione e nel 'data' il riferimento del todo eliminato;
- Commit 16 / 17: Aggiunta ricerca tramite index scripts 'upgrade' & 'delete'. Aggiunte validazioni di alcuni dati. Aggiunta di messaggio di risposta in caso la richiesta non è andata a buon fine.
- Comit 20 / 21: Aggiunte Validazioni, modificato il responsive + Aggiunte di messaggi di errore client;
- Comit 22: Aggiornamento Database + scrpt per il ripristino del database da backup. 