$(document).ready(function () {
    // Add new report
    $("#addReport").click(function () {
        $("#reportForm")[0].reset();
        $("#reportModalLabel").text("Add New Report");
        $("#reportModal").modal("show");
    });

    // Edit report
    $(document).on("click", ".editReport", function () {
        var reportId = $(this).closest("tr").data("id");
        console.log("Edit button clicked for report ID:", reportId); // Debugging
        $.get("/reports/" + reportId + "/edit", function (data) {
            console.log("Data received from server:", data); // Debugging
            $("#reportModalLabel").text("Edit Report");
            $("#reportId").val(data.id);
            $("#name_report").val(data.name_report);
            $("#id_report").val(data.id_report);
            $("#id_dataset").val(data.id_dataset);
            $("#id_group").val(data.id_group);
            $("#reportModal").modal("show");
        }).fail(function (jqXHR, textStatus, errorThrown) {
            console.log("AJAX call failed:", textStatus, errorThrown); // Debugging
        });
    });

    // Save report (create or update)
    $("#reportForm").submit(function (e) {
        e.preventDefault();
        var formData = $(this).serialize();
        var reportId = $("#reportId").val();
        var ajaxUrl = reportId ? "/reports/" + reportId : "/reports";
        var ajaxType = reportId ? "PUT" : "POST";

        $.ajax({
            url: ajaxUrl,
            type: ajaxType,
            data: formData,
            success: function (response) {
                $("#reportModal").modal("hide");
                $("#message-text").text(response.success);
                $("#message").show();
                setTimeout(function () {
                    location.reload();
                }, 2000);
            },
        });
    });

    // Delete report
    $(document).on("click", ".deleteReport", function () {
        if (confirm("Are you sure you want to delete this report?")) {
            var reportId = $(this).closest("tr").data("id");
            $.ajax({
                url: "/reports/" + reportId,
                type: "DELETE",
                data: {
                    _token: $('meta[name="csrf-token"]').attr("content"),
                },
                success: function (response) {
                    $("#message-text").text(response.success);
                    $("#message").show();
                    setTimeout(function () {
                        location.reload();
                    }, 2000);
                },
                error: function (xhr, status, error) {
                    console.error("Error deleting report:", error);
                    alert("Failed to delete report.");
                },
            });
        }
    });
});
