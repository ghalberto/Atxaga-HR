import viewPositionsTableBody from "./../../../partials/position/_positionsTableBody.hbs";

const generatePositionsTableBody = (containerId, positions) => {
    let partialContent = viewPositionsTableBody({ positions });
    document.getElementById(containerId).insertAdjacentHTML("beforeend", partialContent);
};

export { generatePositionsTableBody };
