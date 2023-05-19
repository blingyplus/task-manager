import './bootstrap';
import Sortable from 'sortablejs';

let tasks = document.getElementById('tasks');

if (tasks) {
    new Sortable(tasks, {
        onEnd: function (event) {
            let items = event.target.children;
            for (let i = 0; i < items.length; i++) {
                let item = items[i];
                let id = item.getAttribute('data-id');
                let priority = i + 1;
                axios.put('/tasks/' + id, { priority: priority });
            }
        }
    });
}
