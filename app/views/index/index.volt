{{ content() }}

<table border="1" cellspacing = "0" cellpadding = "5" width="500">
    <tr>
        <th>Tables</th>
        <th>Rows</th>
    </tr>
    {% for table in tables %}
        <tr>
            <td>{{ table['TABLE_NAME'] }}</td>
            <td>{{ table['TABLE_ROWS'] }}</td>
        </tr>
    {% endfor  %}    
</table>

