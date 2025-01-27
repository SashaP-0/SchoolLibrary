const dayInput = document.getElementById('day');
const monthSelect = document.getElementById('month');
const yearInput = document.getElementById('year');

// note that '&&' means 'and', and '||' means 'or'
function isleapyear(year) {
    return (year % 4 === 0 && year % 100 !== 0) || (year % 400 === 0);
}

function getdaysinmonth(month, year) {
    const daysinmonth = [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];
    if (month === 2 && isleapyear(year)) {
        return 29;
    }
    return daysinmonth[month - 1];
}

document.querySelector("form").addEventListener("submit", (event) => {
    const day = parseInt(dayInput.value, 10);
    const month = parseInt(monthSelect.value, 10);
    const year = parseInt(yearInput.value, 10);

    if (isNaN(day) || isNaN(month) || isNaN(year)){
        alert("Invalid Input");
        event.preventDefault();
        return;
    }

    const maxDays = getdaysinmonth(month, year);

    if (day < 1 || day > maxDays) {
        alert("Invalid Input");
        event.preventDefault();
        return;
    }
});