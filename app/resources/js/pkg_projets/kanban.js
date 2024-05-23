const boardsData = [
    {
        id: "_a-faire",
        title: "A faire",
        class: "default",
        items: [{ title: "Tache a faire!" }],
    },
    {
        id: "_encours",
        title: "En cours",
        class: "success",
        items: [{ title: "Tache a en cours!" }],
    },
    {
        id: "_envalidation",
        title: "En validation",
        class: "warning",
        items: [{ title: "Tache en validation" }],
    },
    {
        id: "_terminer",
        title: "Terminer",
        class: "info",
        items: [{ title: "Tache terminer!" }],
    },
];

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

async function fetchTasks() {
    try {
        const response = await fetch("/fetch-tasks");
        if (!response.ok) {
            throw new Error(
                "Network response was not ok" + response.statusText
            );
        }
        const data = await response.json();
        return data;
    } catch (error) {
        console.error("Error fetching data:", error);
        throw error;
    }
}
let KanbanTest;
// Fetch tasks and initialize Kanban board
fetchTasks()
    .then((data) => {
        console.log(data);
        // Initialize the Kanban board after fetching data
        KanbanTest = new jKanban({
            element: "#myKanban",
            gutter: "10px",
            widthBoard: "400px",
            itemHandleOptions: {
                enabled: true,
            },
            boards: data.map((board) => ({
                id: board.id,
                title: board.title,
                class: board.class,
                item: board.items.map((item) => ({
                    title: item.title,
                })),
            })),
        });
    })
    .catch((error) => {
        console.error("Error fetching data:", error);
    });
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
