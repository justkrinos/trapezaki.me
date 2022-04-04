$description = $(this).siblings(".issue-description").html();
        $issuer = $(this).siblings(".issue-business").html();
        $type = $(this).siblings(".issue-type").html();

        $("#issueTextArea").html($description);
        $("#issueBusiness").html($issuer);
        $("#issueType").html($type);