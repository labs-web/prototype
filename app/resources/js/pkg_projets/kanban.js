const boardsData = {
    "a-faire": {
        id: "_a-faire",
        title: "A faire",
        class: "default",
        items: [],
    },
    encours: { id: "_encours", title: "En cours", class: "success", items: [] },
    envalidation: {
        id: "_envalidation",
        title: "En validation",
        class: "warning",
        items: [],
    },
    terminer: { id: "_terminer", title: "Terminer", class: "info", items: [] },
    enattente: {
        id: "_enattente",
        title: "En attente",
        class: "default",
        items: [],
    },
    reportee: {
        id: "_reportee",
        title: "Reportée",
        class: "default",
        items: [],
    },
    annulee: { id: "_annulee", title: "Annulée", class: "default", items: [] },
};

/*
var KanbanTest = new jKanban({
    element: "#myKanban",
    gutter: "10px",
    widthBoard: "400px",
    itemHandleOptions: {
        enabled: true,
    },
    // click: function (el) {
    //     console.log("Trigger on all items click!");
    // },
    // context: function (el, e) {
    //     console.log("Trigger on all items right-click!");
    // },
    // dropEl: function (el, target, source, sibling) {
    //     console.log(target.parentElement.getAttribute("data-id"));
    //     console.log(el, target, source, sibling);
    // },
    // buttonClick: function (el, boardId) {
    //     console.log(el);
    //     console.log(boardId);
    //     // create a form to enter element
    //     var formItem = document.createElement("form");
    //     formItem.setAttribute("class", "itemform");
    //     formItem.innerHTML =
    //         '<div class="form-group"><textarea class="form-control" rows="2" autofocus></textarea></div><div class="form-group"><button type="submit" class="btn btn-primary btn-xs pull-right">Submit</button><button type="button" id="CancelBtn" class="btn btn-default btn-xs pull-right">Cancel</button></div>';

    //     KanbanTest.addForm(boardId, formItem);
    //     formItem.addEventListener("submit", function (e) {
    //         e.preventDefault();
    //         var text = e.target[0].value;
    //         KanbanTest.addElement(boardId, {
    //             title: text,
    //         });
    //         formItem.parentNode.removeChild(formItem);
    //     });
    //     document.getElementById("CancelBtn").onclick = function () {
    //         formItem.parentNode.removeChild(formItem);
    //     };
    // },
    // itemAddOptions: {
    //     enabled: true,
    //     content: "+ Add New Card",
    //     class: "custom-button",
    //     footer: true,
    // },

    boards: boardsData.map((board) => ({
        id: board.id,
        title: board.title,
        class: board.class,
        item: board.items.map((item) => ({
            title: item.title,
        })),
    })),

    // boards: [
    //     {
    //         id: "_a-faire",
    //         title: "A faire",
    //         class: "default,good",
    //         item: [
    //             {
    //                 title: "Try Click This!",
    //             },
    //         ],
    //     },
    //     {
    //         id: "_encours",
    //         title: "En cours",
    //         class: "success",
    //         item: [
    //             {
    //                 title: "Do Something!",
    //             },
    //             {
    //                 title: "Run?",
    //             },
    //         ],
    //     },
    //     {
    //         id: "_envalidation",
    //         title: "En validation",
    //         class: "warning",
    //         // dragTo: ["_working"],
    //         item: [
    //             {
    //                 title: "All right",
    //             },
    //             {
    //                 title: "Ok!",
    //             },
    //         ],
    //     },
    //     {
    //         id: "_terminer",
    //         title: "Terminer",
    //         class: "info",
    //         // dragTo: ["_working"],
    //         item: [
    //             {
    //                 title: "All right",
    //             },
    //             {
    //                 title: "Ok!",
    //             },
    //         ],
    //     },
    // ],
});
*/

// async function fetchTasks() {
//     try {
//         const response = await fetch("/fetch-tasks");
//         if (!response.ok) {
//             throw new Error(
//                 "Network response was not ok" + response.statusText
//             );
//         }
//         const data = await response.json();
//         return data;
//     } catch (error) {
//         console.error("Error fetching data:", error);
//         throw error;
//     }
// }

// let KanbanTest;
// // Fetch tasks and initialize Kanban board
// fetchTasks()
//     .then((data) => {
//         console.log(data);
//         // Initialize the Kanban board after fetching data
//         KanbanTest = new jKanban({
//             element: "#myKanban",
//             gutter: "10px",
//             widthBoard: "400px",
//             itemHandleOptions: {
//                 enabled: true,
//             },
//             boards: data.map((board) => ({
//                 id: board.id,
//                 title: board.title,
//                 class: board.class,
//                 item: board.items.map((item) => ({
//                     title: item.title,
//                 })),
//             })),
//         });
//     })
//     .catch((error) => {
//         console.error("Error fetching data:", error);
//     });

async function fetchTasks() {
    try {
        const response = await fetch("/fetch-tasks");
        if (!response.ok) {
            throw new Error(
                "Network response was not ok: " + response.statusText
            );
        }
        const tasks = await response.json();
        categorizeTasks(tasks);
    } catch (error) {
        console.error("Error fetching data:", error);
    }
}

function categorizeTasks(tasks) {
    tasks.forEach((task) => {
        if (task.statut_taches) {
            switch (task.statut_taches.nom) {
                case "A faire":
                    boardsData["a-faire"].items.push({
                        id: task.id,
                        title: task.nom,
                    });
                    break;
                case "En cours":
                    boardsData["encours"].items.push({
                        id: task.id,
                        title: task.nom,
                    });
                    break;
                case "En validation":
                    boardsData["envalidation"].items.push({
                        id: task.id,
                        title: task.nom,
                    });
                    break;
                case "Terminer":
                    boardsData["terminer"].items.push({
                        id: task.id,
                        title: task.nom,
                    });
                    break;
                case "En attente":
                    boardsData["enattente"].items.push({
                        id: task.id,
                        title: task.nom,
                    });
                    break;
                case "Reportée":
                    boardsData["reportee"].items.push({
                        id: task.id,
                        title: task.nom,
                    });
                    break;
                case "Annulée":
                    boardsData["annulee"].items.push({
                        id: task.id,
                        title: task.nom,
                    });
                    break;
            }
        }
    });
}

let KanbanTest;

// Fetch tasks and initialize Kanban board
fetchTasks()
    .then(() => {
        // Initialize the Kanban board after fetching data
        KanbanTest = new jKanban({
            element: "#myKanban",
            gutter: "10px",
            widthBoard: "400px",
            itemHandleOptions: {
                enabled: true,
            },
            dropEl: function (el, target, source, sibling) {
                const newStatus = target.parentElement.getAttribute("data-id");
                const taskId = el.getAttribute("data-eid");
                console.log("newStatus : ", newStatus);
                console.log("taskId : ", taskId);
                updateStatus(taskId, newStatus);
            },
            boards: Object.values(boardsData).map((board) => ({
                id: board.id,
                title: board.title,
                class: board.class,
                item: board.items.map((item) => ({
                    id: item.id,
                    title: item.title,
                    // drag: function (el, source) {
                    //     console.log("START DRAG: " + el.dataset.eid);
                    // },
                    // dragend: function (el) {
                    //     console.log("END DRAG: " + el.dataset.eid);
                    // },
                    // drop: function (el) {
                    //     console.log("DROPPED: " + el.dataset.eid);
                    //     console.log("el: " + el);
                    //     // alert('change status to : ')
                    // },
                })),
            })),
        });
    })
    .catch((error) => {
        console.error("Error fetching data:", error);
    });



function updateStatus(taskId, newStatus) {
    // Send the request to update the task status
    fetch(`/update-task-status/${taskId}`, {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": document
                .querySelector('meta[name="csrf-token"]')
                .getAttribute("content"),
        },
        body: JSON.stringify({ status: newStatus }),
    })
        .then((response) => response.json())
        .then((data) => {
            console.log("Success:", data);
        })
        .catch((error) => {
            console.error("Error:", error);
        });
}
/*
var toDoButton = document.getElementById("addToDo");
toDoButton.addEventListener("click", function () {
    KanbanTest.addElement("_a-faire", {
        title: "Test Add",
    });
});

var toDoButtonAtPosition = document.getElementById("addToDoAtPosition");
toDoButtonAtPosition.addEventListener("click", function () {
    KanbanTest.addElement(
        "_a-faire",
        {
            title: "Test Add at Pos",
        },
        1
    );
});

var addBoardDefault = document.getElementById("addDefault");
addBoardDefault.addEventListener("click", function () {
    KanbanTest.addBoards([
        {
            id: "_default",
            title: "Kanban Default",
            item: [
                {
                    title: "Default Item",
                },
                {
                    title: "Default Item 2",
                },
                {
                    title: "Default Item 3",
                },
            ],
        },
    ]);
});

var removeBoard = document.getElementById("removeBoard");
removeBoard.addEventListener("click", function () {
    KanbanTest.removeBoard("_terminer");
});

var removeElement = document.getElementById("removeElement");
removeElement.addEventListener("click", function () {
    KanbanTest.removeElement("_test_delete");
});

var allEle = KanbanTest.getBoardElements("_a-faire");
allEle.forEach(function (item, index) {
    //console.log(item);
});
*/
