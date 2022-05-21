//Use bloodhound to prefetch tags
var tags = new Bloodhound({
    datumTokenizer: Bloodhound.tokenizers.whitespace,
    queryTokenizer: Bloodhound.tokenizers.whitespace,
    prefetch: {
        url: "/api/tags"
    }
});

tags.initialize();


//Attatch the bloodhound adapter to the input
$('#tags').tagsinput({
    tagClass: 'badge bg-primary',
    maxTags: 10,
    typeaheadjs: {
        name: 'tags',
        source: tags.ttAdapter()
    }
});


//Delete the comma when inserted
$("input[type='text']").filter(".tt-input").keyup(function () {
    $(this).val(
        function (index, value) {
            if (value.endsWith(","))
                return value.substr(0, value.length - 1)
            else
                return value
        })
});
