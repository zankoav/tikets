import './../common/_common.scss';

/**
 * Add Mastak Library
 */
import './../mastak-lib/loader/loader';

import './../components/title/title';

let data = {
    'user-name': 'alexandr',
    'user-surname': 'zankoav'
};


autoSubmit(data);

function autoSubmit(data) {
    let form = document.createElement("form");
    form.method = "POST";
    form.action = "https://securesandbox.webpay.by/";

    for (let key in data) {
        let element = document.createElement("input");
        element.value = data[key];
        element.name = key;
        form.appendChild(element);
    }

    document.body.appendChild(form);

    form.submit();
}