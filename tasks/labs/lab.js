const path = require('path');
const TodoRepository = require('../Repositories/TodoRepository');

let app_path = path.resolve(__dirname,"../" ) ;


let repo = new TodoRepository(app_path);
repo.findAll();