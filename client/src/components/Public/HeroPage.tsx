import { useEffect } from 'react';
import AOS from 'aos';
import 'aos/dist/aos.css';
import BackgroundBalls from './Animation/Background';
import Header from './Components/Header';
import InformativeSection from './Components/InformativeSection';
import PlayersSection from './Components/PlayersSection';
import { AboutStats } from './Components/Divider';
import ManagersSerction from './Components/Managers';
import Choose from './Components/Choose';

const HeroPage = () => {
  useEffect(() => {
    AOS.init({
      duration: 1000,
      once: false,
      mirror: true,
    });
  }, []);

  return (
    <div className="min-h-screen bg-gradient-to-b from-green-50 to-white relative overflow-hidden">
      <div className="min-h-screen w-full">
      <BackgroundBalls />
      <Header/>
      <InformativeSection/>
      <AboutStats />
      <PlayersSection/>
      <ManagersSerction/>
      <Choose/>
      </div>
    </div>
  );
};

export default HeroPage;