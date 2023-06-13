 
        var api_token = "";

        $.ajax({
            url: "https://www.universal-tutorial.com/api/getaccesstoken",
            type: "GET",
            headers: {
                "Accept": "application/json",
                "api-token": "XQTgGrZeiuNc2IwReSP24PASNGtbY53pEHS2YiKhbkhN7Znkv9fhgAaP5q2vp7FMkw0",
                "user-email": "muba4shir@gmail.com",
            },
            success: function(response) {
                api_token = "Bearer " + response.auth_token;

                countryfunction(api_token)
                
            },
            error: function(error) {
                console.error(error);
            }
        });
    