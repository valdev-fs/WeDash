<!DOCTYPE html>
<html>
<head>
    <title>{{ $report->name_report }}</title>
</head>
<body>
    <h1>{{ $report->name_report }}</h1>
    <div id="reportContainer"></div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/powerbi-client/2.13.3/powerbi.min.js"></script>
    <script>
        var embedConfiguration = {
            type: 'report',
            id: '{{ $report->id_report }}',
            embedUrl: 'https://app.powerbi.com/reportEmbed?reportId={{ $report->id_report }}',
            accessToken: '{{ $embedToken }}'
        };

        var reportContainer = document.getElementById('reportContainer');
        powerbi.embed(reportContainer, embedConfiguration);
    </script>
</body>
</html>
