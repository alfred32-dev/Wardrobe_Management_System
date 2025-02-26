<script setup>
import { ref, watch } from 'vue';
import { Head, Link, useForm, router } from '@inertiajs/vue3';

defineProps({
    clothingItems: Array, // ✅ Now expects a simple array, not paginated data
});

// Search & Filter State
const search = ref('');
const category = ref('');
const outfit = ref('');

// Watch for changes in search & filters, trigger new fetch
watch([search, category, outfit], () => {
    router.get('/dashboard', {
        search: search.value,
        category: category.value,
        outfit: outfit.value,
    }, { preserveState: true, replace: true });
});

// Submit form (Add or Edit)
const form = useForm({
    id: null,
    name: '',
    category: '',
    size: '',
    color: '',
    brand: '',
    price: '',
    image_url: '',
    outfit: '',
});

const submit = () => {
    if (form.id) {
        form.put(`/clothing/${form.id}`, { onSuccess: () => resetForm() });
    } else {
        form.post('/clothing', { onSuccess: () => resetForm() });
    }
};

// Delete Item
const deleteItem = (id) => {
    if (confirm('Are you sure?')) {
        router.delete(`/clothing/${id}`);
    }
};

// Reset Form
const resetForm = () => {
    form.id = null;
    form.name = '';
    form.category = '';
    form.size = '';
    form.color = '';
    form.brand = '';
    form.price = '';
    form.image_url = '';
    form.outfit = '';
};

// Open Edit Modal
const editItem = (item) => {
    form.id = item.id;
    form.name = item.name;
    form.category = item.category;
    form.size = item.size;
    form.color = item.color;
    form.brand = item.brand;
    form.price = item.price;
    form.image_url = item.image_url;
    form.outfit = item.outfit;
};
</script>

<template>
    <div class="min-h-screen flex items-center justify-center bg-gray-100 dark:bg-gray-900">
        <Head title="Dashboard - Wardrobe Management" />

        <div class="w-full max-w-5xl p-6 bg-white rounded-lg shadow-md dark:bg-gray-800">
            <div class="flex justify-between items-center">
                <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Wardrobe Items</h1>
                <Link href="/profile" class="text-indigo-600 hover:underline dark:text-indigo-400">Profile</Link>
            </div>

            <!-- Search & Filters -->
            <div class="flex gap-4 mt-4">
                <input v-model="search" placeholder="Search" class="w-1/3 p-2 border rounded-md dark:bg-gray-700 dark:border-gray-600 dark:text-white" />
                <select v-model="category" class="p-2 border rounded-md dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                    <option value="">All Categories</option>
                    <option>Tops</option>
                    <option>Bottoms</option>
                    <option>Shoes</option>
                    <option>Accessories</option>
                </select>
                <select v-model="outfit" class="p-2 border rounded-md dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                    <option value="">All Outfits</option>
                    <option>Football</option>
                    <option>Church</option>
                    <option>Work</option>
                    <option>Casual</option>
                </select>
            </div>

            <!-- Add / Edit Item Form -->
            <form @submit.prevent="submit" class="mt-6 p-4 border rounded-md bg-gray-50 dark:bg-gray-700">
                <div class="grid grid-cols-2 gap-4">
                    <input v-model="form.name" placeholder="Item Name" class="p-2 border rounded-md dark:bg-gray-700 dark:border-gray-600 dark:text-white" required />
                    <select v-model="form.category" class="p-2 border rounded-md dark:bg-gray-700 dark:border-gray-600 dark:text-white" required>
                        <option>Tops</option>
                        <option>Bottoms</option>
                        <option>Shoes</option>
                        <option>Accessories</option>
                    </select>
                    <input v-model="form.size" placeholder="Size" class="p-2 border rounded-md dark:bg-gray-700 dark:border-gray-600 dark:text-white" />
                    <input v-model="form.color" placeholder="Color" class="p-2 border rounded-md dark:bg-gray-700 dark:border-gray-600 dark:text-white" />
                    <input v-model="form.brand" placeholder="Brand" class="p-2 border rounded-md dark:bg-gray-700 dark:border-gray-600 dark:text-white" />
                    <input v-model="form.price" placeholder="Price" type="number" class="p-2 border rounded-md dark:bg-gray-700 dark:border-gray-600 dark:text-white" />
                    <input v-model="form.image_url" placeholder="Image URL" class="p-2 border rounded-md dark:bg-gray-700 dark:border-gray-600 dark:text-white" />
                    <select v-model="form.outfit" class="p-2 border rounded-md dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                        <option>Football</option>
                        <option>Church</option>
                        <option>Work</option>
                        <option>Casual</option>
                    </select>
                </div>
                <button type="submit" class="w-full mt-4 p-2 bg-indigo-600 text-white rounded-md font-semibold hover:bg-indigo-700 disabled:opacity-50">
                    {{ form.id ? 'Update' : 'Add' }} Item
                </button>
            </form>

            <!-- Items List -->
            <div class="mt-6 overflow-auto">
                <table class="w-full border-collapse border border-gray-300 dark:border-gray-600">
                    <thead>
                        <tr class="bg-gray-200 dark:bg-gray-700">
                            <th class="border p-2">Name</th>
                            <th class="border p-2">Category</th>
                            <th class="border p-2">Size</th>
                            <th class="border p-2">Color</th>
                            <th class="border p-2">Brand</th>
                            <th class="border p-2">Price</th>
                            <th class="border p-2">Outfit</th>
                            <th class="border p-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="item in clothingItems" :key="item.id" class="text-center bg-white dark:bg-gray-800">
                            <td class="border p-2">{{ item.name }}</td>
                            <td class="border p-2">{{ item.category }}</td>
                            <td class="border p-2">{{ item.size }}</td>
                            <td class="border p-2">{{ item.color }}</td>
                            <td class="border p-2">{{ item.brand }}</td>
                            <td class="border p-2">${{ item.price }}</td>
                            <td class="border p-2">{{ item.outfit }}</td>
                            <td class="border p-2">
                                <button @click="editItem(item)" class="text-yellow-500 hover:underline">Edit</button>
                                <button @click="deleteItem(item.id)" class="ml-2 text-red-500 hover:underline">Delete</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <p class="mt-6 text-center text-xs text-gray-500 dark:text-gray-400">
                Made by Alfred
            </p>
        </div>
    </div>
</template>
