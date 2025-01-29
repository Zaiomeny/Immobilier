/**
 * Close form modals after livewire dispached events tagged at the constant[] livewireEvents
 */
document.addEventListener('DOMContentLoaded', function () {
    const livewireEvents = ['postCreated', 'categoryCreated'];
    const removeModalBackdrop = () => {
        const modals = document.querySelectorAll('.modal');
        const backdrops = document.querySelectorAll('.modal-backdrop');
        const body = document.body;
        modals.forEach((modal) => {
            if (modal.classList.contains('show')) {
                modal.classList.remove('show');
                modal.style.display = 'none';
                modal.setAttribute('aria-hidden', 'true');
                modal.setAttribute('data-bs-modal', null);
            }
        })
        for (let b of backdrops) {
            b.remove();
        }
        body.classList.remove('modal-open');
        body.setAttribute('style', null);
    };
    livewireEvents.forEach((eventType) => {
        Livewire.on(eventType, removeModalBackdrop);
    });
});
// /**
//  * Toggle the div element which contains the actions to remove or edit a post comment
//  */
// document.addEventListener('DOMContentLoaded', () => {
//     const wireEvents = ['commentCreated'];

//     const handleAction = ()=>{
//         let buttons = document.querySelectorAll("i#show-action");
//         buttons.forEach((show) => {
//             show.addEventListener("click", () => {
//                 buttons.forEach((btn) => {
//                     if (btn == show) {
//                         show.querySelector("#actions").classList.toggle('active')
//                     } else {
//                         btn.querySelector("#actions").classList.remove('active')
//                     }
//                 });
//             });
//         });
//     }
//     //first call
//     handleAction();
//     //By this way, even the fresh comment element can be deleted
//     wireEvents.forEach((eventType) =>  {
//         Livewire.on(eventType, ()=>{
//             handleAction();
//         }
//         );
//     });
// });
