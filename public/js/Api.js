function Api()
{

}

Api.post = function(url, data, callback)
{
    $.post( url, data, function(data) {
        try
        {
            callback(data);
        }
        catch(exception)
        {
            callback(ko.toJSON({status: 0, mensagem: 'Ocorreu um erro no retorno do serviço.'}));
        }
    })
    .fail(function($err)
    {
        if ($err.status == 422)
        {
            alert($err.responseJSON.description);
            return;
        }
        alert('Ocorreu um erro na execução do serviço.');
    })
    .always(function()
    {
    });
}

Api.get = function(url, callback)
{

    // self.doGetURL = function(id, callback)
    // var url = repo_link+'/'+id+'/'+repo_token;

    // $.ajax({
    //     type: 'GET',
    //     url: url,
    //     async: true,
    //     success: function(data)
    //     {
    //         callback(data);
    //     },
    //     error: function(request, status, error)
    //     {
    //         alert(request.responseText);
    //     }
    // });

    $.get(url, callback)
    .fail(function()
    {
        alert('Ocorreu um erro na execução do serviço.');
    })
    .always(function()
    {
    });
}

Api.groupList = function(list, groupedTotal)
{
    var groupedList = [],
        listTemp = [],
        count = 0;

    ko.utils.arrayForEach(list, function(item, i)
    {
        count ++;
        listTemp.push(item);

        if ((count % groupedTotal) == 0 || list.length == i+1)
        {
            groupedList.push(listTemp);
            count = 0;
            listTemp = [];
        } 
    });

    return groupedList;
}

Api.url = function(id)
{
    return repo_link+'/'+id+'/'+repo_token;
}