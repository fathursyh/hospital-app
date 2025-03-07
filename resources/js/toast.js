import 'flowbite';
import { Dismiss } from 'flowbite';
const $targetEl = document.getElementById('toast-success');
// options object
const options = {
    transition: 'transition-opacity',
    duration: 400,
    timing: 'ease-out',
};

// instance options object
const instanceOptions = {
    id: 'toast-success',
    override: true
};
const dismiss = new Dismiss($targetEl, null, options, instanceOptions);
    setTimeout(() => {
        if(dismiss) dismiss.hide();
    }, 4000);
