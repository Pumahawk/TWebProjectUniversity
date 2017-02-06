#App

La cartella app contiene il codice principale della applicazione, questo significa
che chi crea l'applicazione dovra inserire in questa cartella il suo codice sorgente
utilizzando le cartelle consigliate.

Non è obbligatorio utilizzare queste cartelle. Il programmatore ha una completa 
liberta nel decidere in che posto inserire il proprio codice sorgente.

##Contenuto cartella

###File

Si consiglia di non cancellare i seguenti file perché la loro assenza potrebbe 
causare il malfunzionamento dell'applicazione.

* *Middleware.php* File in cui creare i middleware.
* *Router.php* File in cui dichiarare i reindirizzamenti delle richieste.

###Cartelle

* *Configuration*: contine file di configurazione.
* *Controller*: Contine le classi che gestiscono le richieste al server.
* *Model*: Contiene le api che permettono ai controller di elaborare le richieste.
* *Template*: Contiene l'interfaccia grafica dell'applicazione
* *View*: Contiene le classi che gestiscono l'interfaccia frafica.