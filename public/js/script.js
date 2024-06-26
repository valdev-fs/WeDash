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
    $("#embedStatus").text(message).addClass("text-danger").fadeIn();
}

async function fetchFilterData(reportId) {
    try {
        const response = await fetch(
            `/api/get-branch-filter-data?id=${reportId}`,
            {
                headers: {
                    Accept: "application/json",
                },
            }
        );
        const contentType = response.headers.get("content-type");
        if (!contentType || !contentType.includes("application/json")) {
            const text = await response.text();
            console.error("Unexpected response:", text);
            throw new Error(`Expected JSON, got: ${text}`);
        }
        const data = await response.json();
        return data;
    } catch (error) {
        console.error("Error in fetchFilterData:", error);
        throw error;
    }
}

async function fetchUserDepartmentData() {
    try {
        const response = await fetch("/api/get-user-department-data", {
            headers: {
                Accept: "application/json",
            },
        });
        const contentType = response.headers.get("content-type");
        if (!contentType || !contentType.includes("application/json")) {
            const text = await response.text();
            console.error("Unexpected response:", text);
            throw new Error(`Expected JSON, got: ${text}`);
        }
        const data = await response.json();
        return data;
    } catch (error) {
        console.error("Error in fetchUserDepartmentData:", error);
        throw error;
    }
}

function embedReport(config) {
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
}

function loadReport(reportId) {
    showLoadingBar(0);
    $("#embedStatus").fadeOut();
    var id = reportId;

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

            fetchUserDepartmentData()
                .then((userDepartmentData) => {
                    var config;
                    var models = window["powerbi-client"].models; // Define models here
                    if (userDepartmentData.group !== "HO") {
                        fetchFilterData(id)
                            .then((branchFilterData) => {
                                if (branchFilterData.branchTables === "OpCent DimBranch") {
                                    codeDepartmentValue = userDepartmentData.codeDepartment;
                                } else {
                                    codeDepartmentValue = ~~userDepartmentData.codeDepartment;
                                }

                                var branchFilter = {
                                    $schema:
                                        "http://powerbi.com/product/schema#basic",
                                    target: {
                                        table: branchFilterData.branchTables, // Fetch value from BranchFilter table
                                        column: "BranchCode", // Adjust as necessary
                                    },
                                    operator: "In",
                                    values: [
                                        codeDepartmentValue,
                                    ], // Use code_department value
                                };
                                config = {
                                    type: "report",
                                    tokenType: models.TokenType.Embed,
                                    accessToken: embedToken,
                                    embedUrl: `https://app.powerbi.com/reportEmbed?reportId=${reportId}&groupId=${groupId}`,
                                    id: reportId,
                                    permissions: models.Permissions.All,
                                    settings: {
                                        filterPaneEnabled: false, // Disable the filter pane
                                        navContentPaneEnabled: false, // Disable the navigation content pane
                                        panes: {
                                            filters: {
                                                visible: false, // Hide the filters pane
                                            },
                                            pageNavigation: {
                                                visible: false, // Hide the page navigation pane
                                            },
                                            visualizations: {
                                                visible: false, // Hide the visualizations pane (for dashboards)
                                            },
                                            bookmarks: {
                                                visible: false, // Hide the bookmarks pane
                                            },
                                        },
                                        bars: {
                                            statusBar: {
                                                visible: false, // Hide the status bar
                                            },
                                            actionBar: {
                                                visible: false, // Hide the action bar
                                            },
                                        },
                                        bookmarksPaneEnabled: false, // Disable the bookmarks pane
                                        // Set background to transparent
                                    },
                                    filters: [branchFilter],
                                };

                                embedReport(config);
                            })
                            .catch((error) => {
                                console.error(
                                    "Error fetching filter data",
                                    error
                                );
                                showLoadingBar(0);
                                showError(
                                    "Error fetching filter data: " + error
                                );
                            });
                    } else {
                        config = {
                            type: "report",
                            tokenType: models.TokenType.Embed,
                            accessToken: embedToken,
                            embedUrl: `https://app.powerbi.com/reportEmbed?reportId=${reportId}&groupId=${groupId}`,
                            id: reportId,
                            permissions: models.Permissions.All,
                            settings: {
                                filterPaneEnabled: false, // Disable the filter pane
                                navContentPaneEnabled: false, // Disable the navigation content pane
                                panes: {
                                    filters: {
                                        visible: false, // Hide the filters pane
                                    },
                                    pageNavigation: {
                                        visible: false, // Hide the page navigation pane
                                    },
                                    visualizations: {
                                        visible: false, // Hide the visualizations pane (for dashboards)
                                    },
                                    bookmarks: {
                                        visible: false, // Hide the bookmarks pane
                                    },
                                },
                                bars: {
                                    statusBar: {
                                        visible: false, // Hide the status bar
                                    },
                                    actionBar: {
                                        visible: false, // Hide the action bar
                                    },
                                },
                                bookmarksPaneEnabled: false, // Disable the bookmarks pane
                                // Set background to transparent
                            },
                        };

                        embedReport(config);
                    }
                })
                .catch((error) => {
                    console.error("Error fetching user department data", error);
                    showLoadingBar(0);
                    showError("Error fetching user department data: " + error);
                });
        },
        error: function (err) {
            console.error("Error fetching embed token", err);
            showLoadingBar(0);
            showError("Error fetching embed token: " + JSON.stringify(err));
        },
    });
}
