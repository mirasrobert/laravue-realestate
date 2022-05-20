import { ref } from "vue";
import { fetchProfile, fetchProfileRents } from "../services/profileService";

export default function useProfile() {
    const profileIsLoading = ref(true);
    const profileError = ref(null);
    const profile = ref(null);

    const rentsIsLoading = ref(true);
    const rentError = ref(null);
    const listing = ref(null);

    const getProfile = async (profileId) => {
        profileIsLoading.value = true;
        profileError.value = null;
        try {
            const data = await fetchProfile(profileId);
            profile.value = data;
        } catch (error) {
            profileError.value = error;
        }
        profileIsLoading.value = false;
    };

    const getProfileRents = async (rentId) => {
        rentsIsLoading.value = true;
        rentError.value = null;
        try {
            const data = await fetchProfileRents(rentId);
            listing.value = data;
        } catch (error) {
            rentError.value = error;
        }
        rentsIsLoading.value = false;
    };

    return {
        profile,
        profileIsLoading,
        profileError,
        getProfile,
        getProfileRents,
        rentsIsLoading,
        rentError,
        listing,
    };
}
