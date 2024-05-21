const fs = require('fs');
const path = require('path');
const Task = require('../Entities/Task')

class TodoRepository{

    constructor(app_path){

        // process.cwd() = path d'exécusion de script
        this.app_path = path.resolve(__dirname,app_path ) ;
        this.todoLines = [];

        // Ne pas traiter les dossiers suivant : 
        // TODO : ne pas traiter tous les fichiers et dossier indiquer dans le fichier .gitignore
        this.directory_ignore = [".bundle",".vscode",".git",".github","_site","vendor","node_modules"]

        this.todo_comment_and_tag = ["// TODO","<!-- TODO"]
        

    }

    // TODO : Oraniser ce code dans StringUtil
    compareByMultiple(property1, property2) {
      return function (a, b) {
          const valueA1 = a[property1];
          const valueB1 = b[property1];
          const valueA2 = a[property2];
          const valueB2 = b[property2];
  
          if (valueA1 < valueB1) {
              return -1;
          } else if (valueA1 > valueB1) {
              return 1;
          } else { // Properties are equal, compare by the second property
              if (valueA2 < valueB2) {
                  return -1;
              } else if (valueA2 > valueB2) {
                  return 1;
              } else {
                  return 0; // Both properties are equal
              }
          }
      };
  }

   compareByProperty(property) {
      return function (a, b) {
          const valueA = a[property].toUpperCase(); // Ensure case-insensitive sorting (optional)
          const valueB = b[property].toUpperCase();
          if (valueA < valueB) {
              return -1;
          } else if (valueA > valueB) {
              return 1;
          } else {
              return 0; // Equal values
          }
      };
  }


    /**
     * find all todo in current Laravel app
     */
    findAll(){
        
        this.traverse(this.app_path);
        this.todoLines = this.todoLines.sort(this.compareByMultiple('level','technology'));
        return this.todoLines;
    }

    /**
     * Une fonction récursive
     * @param {*} dir 
     */
    traverse(dir) {
      
        const files = fs.readdirSync(dir);
        for (const file of files) {
          const filePath = path.join(dir, file);
          const stats = fs.statSync(filePath);
          if (stats.isDirectory()) {
    
           
            // ne pas traiter le dossier node_module,vendor
            if(this.directory_ignore.includes(file)){
              continue
            }

            // ne pas traiter les dossier caché
            if(file.startsWith(".") ){
            continue
          }

            this.traverse(filePath);
          } else if (stats.isFile()) {
            const content = fs.readFileSync(filePath, 'utf8');
            const lines = content.split(/\r?\n/);

            lines.forEach((todo_line,index) => {

              // if (todo_line.trim().startsWith('// TODO')) {
              if(this.todo_comment_and_tag.some(element => todo_line.startsWith(element))){
                // Afficher un message sans retour à la ligne
                process.stdout.write('.'); 
                let num_line = index +1
                this.todoLines.push (new Task(filePath,num_line,todo_line));
              }
            });
          }
        }
      }

}

module.exports = TodoRepository