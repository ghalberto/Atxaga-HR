//JavaScript
import { API_POSITION } from "./utils/api/endpoints";
import { request } from "./utils/api/request";
import { generatePositionsTableBody } from "./utils/content/position";
import { SwalNotification, SwalNotification_Toast } from "./utils/SwalNotification";

//Styles
import "../sass/mgmPositions.scss";

const listPositions = async () => {
    try {
        const data = await request(`${API_POSITION}s`);
        if (data.message === "SUCCESS") {
            generatePositionsTableBody("positionsTableBody", data.body);
        } else if (data.message === "NOTFOUND") {
            SwalNotification_Toast("info", "Not positions found...", "bottom-end", 2000);
        } else {
            SwalNotification_Toast("error", "An unexpected error ocurred...", "bottom-end", 2000);
        }
    } catch (err) {
        SwalNotification(document.title, err, "error", "Ok");
    }
};

window.addEventListener("load", () => {
    (async () => {
        await listPositions();
    })();
});
