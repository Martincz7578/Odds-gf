const Result = document.getElementById('result');

const Unattractive = ['Keith', 'Melvin', 'Eugene', 'Donald', 'Bert',
    'Hubert', 'Celtus', 'Elmer', 'Herbert', 'Ernie',
    'Horace', 'Wilbur', 'Rufus', 'Marvin'];

const UnattractiveHobbies = ['Anime', 'Gaming', 'Collecting Action Figures',
    'Watching Cartoons', 'Cosplaying', 'Role-Playing Games',
    'Comic Books', 'Tabletop Gaming', 'Model Building'];

const SemiHobbies = ['Photography', 'Hiking', 'Board games', 'Cooking',
    'Languages', 'Yoga', 'Drawing'];

const AttractiveHobbies = ['Martial arts', 'Dancing', 'Travelling',
    'Music', 'Rock Climbing', 'Writing', 'Performer', 'High-school/Uni'];

    function HobbyVal(Hobbies){
        let score = 0;
        if (!Hobbies) return 0;

        let hobbies;
        if (Array.isArray(Hobbies)) {
            hobbies = Hobbies.map(h => String(h).trim()).filter(Boolean);
        } else {
            hobbies = String(Hobbies).split(',').map(s => s.trim()).filter(Boolean);
        }

        const lower = hobbies.map(h => h.toLowerCase());
        const attractiveSet = new Set(AttractiveHobbies.map(h => h.toLowerCase()));
        const semiSet = new Set(SemiHobbies.map(h => h.toLowerCase()));

        if (lower.some(h => attractiveSet.has(h))) {
            score += 2;
        } else if (lower.some(h => semiSet.has(h))) {
            score += 1;
        } else {
            score -= 1;
        }

        return Math.max(0, Math.min(10, score));
    }

function calculate(N, A, T, To, Hb, C, H, W) {
    document.getElementsByClassName('modal-wrapper')[0].style.display = 'flex';

    const NVal = Unattractive.includes(N) ? 1 : 5;
    const HbVal = HobbyVal(Hb);

    const C_f = Math.max(0, Math.min(1, C/10));
    const A_f = Math.max(0, Math.min(1, 1 - Math.abs(A - T)/40));
    const H_f = Math.max(0, Math.min(1, (H - 140)/60));
    const BMI = W/((H/100)**2);
    const W_f = Math.max(0, Math.min(1, 1 - Math.abs(BMI - 22)/20));
    const N_f = Math.max(0, Math.min(1, NVal/10));
    const To_f = Math.max(0, Math.min(1, Math.min(To, 20)/20));
    const Hb_f = Math.max(0, Math.min(1, HbVal/10));

    const PhyAvrg = (H_f+W_f)/2;
    const P = (0.3*C_f+0.2*A_f+0.2*PhyAvrg*0.05*N_f+0.15*To_f+0.1*Hb_f)*100;

    const Expo = 1.05+0.05*C_f;

    const Chance = Math.round(Math.min(100, Math.pow(P, Expo))*100)/100;

    Result.innerHTML = `<strong>${Chance}% - ${Chance >= 50 ? 'Attractive' : 'Unattractive'}</strong>`;
}

function closeModal() {
    document.getElementsByClassName('modal-wrapper')[0].style.display = 'none';
}