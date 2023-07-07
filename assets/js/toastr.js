/*
 Template Name: Monster Admin
 Author: Themedesigner
 Email: niravjoshi87@gmail.com
 File: js
 */

function infotoast(heading, msg) {
    $.toast({
        heading: heading,
        text: msg,
        position: 'top-right',
        loaderBg: '#ff6849',
        icon: 'info',
        hideAfter: 3000,
        stack: 6
    });
}

function warningtoast(heading, msg) {
    $.toast({
        heading: 'Welcome to Monster admin',
        text: 'Use the predefined ones, or specify a custom position object.',
        position: 'top-right',
        loaderBg: '#ff6849',
        icon: 'warning',
        hideAfter: 3500,
        stack: 6
    })
    ;
    
}

function successtoast(heading, msg) {
    $.toast({
        heading: 'Welcome to Monster admin',
        text: 'Use the predefined ones, or specify a custom position object.',
        position: 'top-right',
        loaderBg: '#ff6849',
        icon: 'success',
        hideAfter: 3500,
        stack: 6
    });
}

function errortoast(heading, msg) {
    $.toast({
        heading: 'Welcome to Monster admin',
        text: 'Use the predefined ones, or specify a custom position object.',
        position: 'top-right',
        loaderBg: '#ff6849',
        icon: 'error',
        hideAfter: 3500
    });
}


