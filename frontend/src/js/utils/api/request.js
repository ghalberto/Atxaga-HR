import { SwalNotification } from "./../SwalNotification";

const request = async (API_URL, method = "GET", body = {}) => {
    let options = { method: method };

    options.headers = {
        Accept: "application/json",
        "Content-Type": "application/json"
    };

    if (method === "POST" || method === "PUT") {
        options.body = JSON.stringify(body);
    }

    try {
        const response = await fetch(API_URL, options);
        if (response.ok) {
            return await response.json();
        } else {
            return {
                statusCode: response.status,
                message: "Error"
            };
        }
    } catch (err) {
        SwalNotification(document.title, err, "error", "Ok");
    }
};

export { request };
