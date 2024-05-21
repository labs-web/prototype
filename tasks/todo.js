const path = require('path');
const TodoManager = require('./Managers/TodoManager');

let app_path = path.resolve(__dirname,"../" ) ;


// Export all toto task to csv file
let todoManager = new TodoManager(app_path);
todoManager.export_to_csv();



