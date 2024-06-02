$(document).ready(function () {
    $(".side-menu li").hover(function () {
        $(this).find(".reports").slideToggle();
    });

    // Set active class on clicked menu item
    $(".side-menu li").click(function () {
        $(".side-menu li").removeClass("active");
        $(this).addClass("active");
    });
});

function showLoadingBar(percentage) {
    var loadingBar = $("#loadingBar");
    var loadingBarContainer = $("#loadingBarContainer");

    if (percentage === 0) {
        loadingBarContainer.fadeIn();
    }

    loadingBar.css("width", percentage + "%");

    if (percentage < 50) {
        loadingBar.css("background-color", "red");
    } else if (percentage < 100) {
        loadingBar.css("background-color", "yellow");
    } else {
        loadingBar.css("background-color", "green");
    }

    if (percentage === 100) {
        setTimeout(function () {
            loadingBarContainer.fadeOut();
            loadingBar.css("width", "0");
        }, 1000);
    }
}

function hideLoadingBar() {
    var loadingBarContainer = $("#loadingBarContainer");
    loadingBarContainer.fadeOut();
    $("#loadingBar").css("width", "0");
}

function showError(message) {
    $('#embedStatus').text(message).addClass('text-danger').fadeIn();
}

function loadReport(reportId) {
    showLoadingBar(0);
    $('#embedStatus').fadeOut();

    $.ajax({
        url: `/reports/${reportId}`,
        method: "GET",
        dataType: "json",
        success: function (data) {
            var embedToken = data.embedToken;
            var reportId = data.reportId;
            var groupId = data.groupId;
            var errorMessage = data.errorMessage;

            if (errorMessage) {
                showError("Error: " + errorMessage);
                return;
            }

            var models = window["powerbi-client"].models;
            var config = {
                type: "report",
                tokenType: models.TokenType.Embed,
                accessToken: embedToken,
                embedUrl: `https://app.powerbi.com/reportEmbed?reportId=${reportId}&groupId=${groupId}`,
                id: reportId,
                permissions: models.Permissions.All,
                settings: {
                    panes: {
                        filters: {
                            visible: true,
                        },
                        pageNavigation: {
                            visible: true,
                        },
                    },
                    bars: {
                        statusBar: {
                            visible: true,
                        },
                    },
                    layoutType: models.LayoutType.Custom,
                },
            };

            var reportContainer = document.getElementById("reportContainer");
            var report = powerbi.embed(reportContainer, config);

            var loadingInterval = setInterval(function () {
                var width = parseInt($("#loadingBar").css("width"));
                var containerWidth = reportContainer.clientWidth;
                if (width < containerWidth) {
                    var percentage = (width / containerWidth) * 100 + 1;
                    showLoadingBar(Math.min(percentage, 100));
                } else {
                    clearInterval(loadingInterval);
                }
            }, 100);

            report.on("loaded", function () {
                showLoadingBar(50);
            });

            report.on("rendered", function () {
                showLoadingBar(100);
                setTimeout(hideLoadingBar, 1000);
            });

            report.on("error", function (event) {
                console.error("Error embedding report:", event.detail);
                showLoadingBar(0);
                showError("Error embedding report: " + event.detail.message);
            });

            $("#fullScreenBtn").on("click", function () {
                report.fullscreen();
            });
        },
        error: function (err) {
            console.error("Error fetching embed token", err);
            showLoadingBar(0);
            showError("Error fetching embed token: " + JSON.stringify(err));
        },
    });
}