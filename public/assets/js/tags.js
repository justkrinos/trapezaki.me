//   $(function () {

    var tags = new Bloodhound({
        datumTokenizer: Bloodhound.tokenizers.whitespace,
        queryTokenizer: Bloodhound.tokenizers.whitespace,
        prefetch: {
            url: "../api/tags"
        }
    });

    tags.initialize();


    $('#tags').tagsinput({
        tagClass: 'badge bg-primary',
        maxTags: 10,
        typeaheadjs: {
            name: 'tags',
            source: tags.ttAdapter()
        }
    });

//  })


