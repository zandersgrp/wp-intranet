jQuery(document).ready(function ($) {
    function handleSearch(inputId, resultsId, postType) {
        $(inputId).on("keyup", function () {
            const searchTerm = $(this).val();
            if (searchTerm.length > 2) {
                $.ajax({
                    url: ajax_object.ajax_url,
                    method: "GET",
                    data: {
                        action: "search_posts",
                        term: searchTerm,
                        post_type: postType, // Ensure the correct post type is passed.
                    },
                    success: function (response) {
                        $(resultsId).empty();
                        if (response.length) {
                            response.forEach(function (item) {
                                $(resultsId).append(
                                    `<div class="result-item" data-id="${item.id}">${item.title}</div>`
                                );
                            });
                        } else {
                            $(resultsId).append("<div>No results found</div>");
                        }
                    },
                });
            } else {
                $(resultsId).empty();
            }
        });

        $(document).on("click", resultsId + " .result-item", function () {
            const selectedId = $(this).data("id");
            const selectedTitle = $(this).text();
            alert(`Selected: ${selectedTitle} (ID: ${selectedId})`); // Temporary for debugging.
            $(resultsId).empty();
        });
    }

    // Set up searches for Materials and Laborers with correct post types.
    handleSearch("#search_material", "#material_results", "material");
    handleSearch("#search_laborer", "#laborer_results", "laborer");
});
