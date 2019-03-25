import './points.scss';
import $ from 'jquery';
import 'paroller.js';


let bodyHeight = Math.max($(document).height(), $(window).height());


const NUMBER_OF_POINTS = bodyHeight / 240;
const COLORS = [
    '#fbbe49',
    '#f85c5d',
    '#CACFDD'
];


for (let i = 0; i < NUMBER_OF_POINTS; i++) {
    (new Point()).show();
}

function Point() {
    let view = document.createElement('div');
    let classText = getRandomArbitrary(0, 4);
    view.setAttribute('class', `points points_${classText}`);
    let randomColor = COLORS[getRandomArbitrary(0, COLORS.length - 1)];
    view.style.backgroundColor = randomColor;
    view.style.top = Math.random() * 98 + '%';
    view.style.left = Math.random() * 95 + '%';


    this.show = function () {
        document.body.appendChild(view);
        $(view).paroller(
            {
                factor: -$(view).width() / 100,
                type: 'foreground',
                direction: 'vertical'
            }
        );
    }
}

function getRandomArbitrary(min, max) {
    return Math.floor(Math.random() * (max - min + 1)) + min;
}

