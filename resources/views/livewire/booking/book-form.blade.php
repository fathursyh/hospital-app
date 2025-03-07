<form class="xl:w-1/3 mx-auto" wire:submit="submit" novalidate>
    @csrf
    <h3 class="text-center xl:text-2xl text-xl font-bold font-madimi-one text-gray-700 dark:text-gray-300 mb-6">Book New Appointment
    </h3>
    <div class="grid md:grid-cols-2 md:gap-6">
        {{-- FULL NAME --}}
        <div class="relative z-0 w-full mb-5 group">
            <input type="text" name="full_name" id="full_name" wire:model="full_name"
                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                placeholder=" " required />
            @error('full_name')
                <p class="text-xs text-red-500 ps-1 pt-1">{{ $message }}</p>
            @enderror
            <label for="full_name"
                class="peer-focus:font-medium absolute text-sm text-gray-700 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Full
                name</label>
        </div>

    </div>
    {{-- EMAIL --}}
    <div class="relative z-0 w-full mb-5 group">
        <input type="email" name="email" id="email" wire:model="email"
            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
            placeholder=" " required />
        @error('email')
            <p class="text-xs text-red-500 ps-1 pt-1">{{ $message }}</p>
        @enderror
        <label for="email"
            class="peer-focus:font-medium absolute text-sm text-gray-700 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Email
            address</label>
    </div>
    <div class="relative z-0 w-fit mb-5 group">
        {{-- DATE --}}
        <input type="date" name="date" id="date" wire:model="date" min="{{ date('Y-m-d') }}" max="{{ date('Y-m-d', strtotime('+ 2 months'))  }}"
            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
            placeholder=" " required />
        @error('date')
            <p class="text-xs text-red-500 ps-1 pt-1">{{ $message }}</p>
        @enderror
        <label for="date"
            class="peer-focus:font-medium absolute text-sm text-gray-700 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">date</label>
    </div>
    {{-- GENDER --}}
    <div class="relative z-0 w-full mb-5 group">
        <div class="flex items-center mb-4">
            <input id="gender-1" type="radio" value="m" name="gender" wire:model="gender"
                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label for="gender-1" class="ms-2 font-medium text-sm text-gray-600 dark:text-gray-400">Man</label>
        </div>
        <div class="flex items-center">
            <input id="gender-2" type="radio" value="w" name="gender" wire:model="gender"
                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600 rounded-full">
            <label for="gender-2" class="ms-2 font-medium text-sm text-gray-600 dark:text-gray-400">Woman</label>
        </div>
    </div>
    {{-- PHONE --}}
    <div class="relative z-0 w-full mb-5 group">
        <input type="tel" name="phone" id="phone" wire:model="phone"
            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
            placeholder=" " required />
        @error('phone')
            <p class="text-xs text-red-500 ps-1 pt-1">{{ $message }}</p>
        @enderror
        <label for="phone"
            class="peer-focus:font-medium absolute text-sm text-gray-700 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Phone
            Number</label>
    </div>
    {{-- ADDRESS --}}
    <div class="relative z-0 w-full mb-5 group">
        <input type="text" name="address" id="address" wire:model="address"
            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
            placeholder=" " required />
        @error('address')
            <p class="text-xs text-red-500 ps-1 pt-1">{{ $message }}</p>
        @enderror
        <label for="address"
            class="peer-focus:font-medium absolute text-sm text-gray-700 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Address</label>
    </div>
    {{-- REASON --}}
    <div class="relative z-0 w-full mb-5 group">

        <label for="reason" class="block mb-2 text-sm text-gray-700 dark:text-gray-400">Reason of appointment</label>
        <textarea id="reason" name="reason" rows="4" wire:model="reason"
            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            placeholder="Your reason here.."></textarea>
        @error('reason')
            <p class="text-xs text-red-500 ps-1 pt-1">{{ $message }}</p>
        @enderror

    </div>
    <button type="submit"
        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
</form>
