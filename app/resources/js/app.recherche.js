
import "https://code.jquery.com/jquery-3.6.0.min.js";

$(document).ready(function () {
    // Fonction pour mettre à jour un paramètre dans l'URL
   /**
 * Function to update or add a query parameter in the current URL without reloading the page.
 * @param {string} param - The parameter name to update or add.
 * @param {string} paramVal - The value of the parameter to set.
 */
function updateURLParameter(param, paramVal) {
    var url = window.location.href;
    var hash = location.hash;

    // Remove hash from the URL
    url = url.replace(hash, "");

    // Check if the parameter already exists in the URL
    if (url.indexOf(param + "=") >= 0) {
        var prefix = url.substring(0, url.indexOf(param + "="));
        var suffix = url.substring(url.indexOf(param + "="));
        suffix = suffix.substring(suffix.indexOf("=") + 1);
        suffix = suffix.indexOf("&") >= 0 ? suffix.substring(suffix.indexOf("&")) : "";
        url = prefix + param + "=" + paramVal + suffix;
    } else {
        // If parameter doesn't exist, append it to the URL
        if (url.indexOf("?") < 0) 
            url += "?" + param + "=" + paramVal;
        else 
            url += "&" + param + "=" + paramVal;
    }

    // Update the URL in the browser history
    window.history.replaceState({ path: url }, "", url + hash);
}

    // Fonction pour récupérer les données avec AJAX
    function fetchData(page, searchValue) {
        var neededUrl = window.location.pathname;
        console.log(neededUrl);
        $.ajax({
            url: neededUrl+"/?page=" + page + "&searchValue=" + searchValue,

            success: function (data) {
                var newData = $(data);
                if (url === "/projets") {
                    $("tbody").html(newData.find("tbody").html());
                } else if (url === "/Apprenant") {
                    $("#table-personne").html(newData.find("#table-personne").html());
                }
                $("#card-footer").html(newData.find("#card-footer").html());
                var paginationHtml = newData.find(".pagination").html();
                $(".pagination").html(paginationHtml || "");
            },
        });

        if (page !== null && searchValue !== null) {
            updateURLParameter("page", page);
            updateURLParameter("searchValue", searchValue);
        } else {
            window.history.replaceState({}, document.title, window.location.pathname);
        }
    }

    // Get initial page value
    var initialPage = getUrlParameter("page");

    // Trigger initial data fetch if page is defined
    if (initialPage) {
        var searchValueFromUrl = getUrlParameter("searchValue");
        $("#table_search").val(searchValueFromUrl);
        fetchData(initialPage, searchValueFromUrl);
    }

    // Handle pagination click event
    $(document).on("click", ".pagination a", function (event) {
        event.preventDefault();
        var page = $(this).attr("href").split("page=")[1];
        var searchValue = $("#table_search").val();
        fetchData(page, searchValue);
    });

    // Handle search input event
    $("body").on("keyup", "#table_search", function () {
        var page = initialPage || 1; // Set a default page value if undefined
        var searchValue = $(this).val();
        fetchData(page, searchValue);
    });

    // Soumission du formulaire
    function submitForm() {
        document.getElementById("importForm").submit();
    }

    // Activation des dropdowns Bootstrap
    $(".dropdown-toggle").dropdown();
});
