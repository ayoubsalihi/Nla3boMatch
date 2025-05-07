import { useState, useEffect } from 'react';
import CountUp from 'react-countup';

export const GradientDivider = () => (
  <div className="relative my-12 group">
    <div className="absolute inset-0 flex items-center">
      <div className="w-full h-px animate-shimmer bg-[linear-gradient(90deg,transparent_25%,#ff763f_50%,transparent_75%)] bg-[length:200%_100%]" />
    </div>
  </div>
);

interface StatsItem {
  value: number;
  label: string;
  suffix?: string;
}

export const StatsCounter = ({ stats }: { stats: StatsItem[] }) => {
  const [start, setStart] = useState(false);

  useEffect(() => {
    setStart(true);
  }, []);

  return (
    <div className="grid grid-cols-2 gap-8 md:flex md:justify-center md:gap-16">
        
      {stats.map((stat, index) => (
        <div key={index} className="text-center">
          <div className="text-4xl font-bold text-orange-600 mb-2 transition-all duration-300 hover:text-orange-700">
            <CountUp
              start={0}
              end={start ? stat.value : 0}
              duration={2.5}
              suffix={stat.suffix || ''}
              className="inline-block"
            />
          </div>
          <div className="text-gray-600 uppercase text-sm tracking-wide font-medium">
            {stat.label}
          </div>
        </div>
      ))}
    </div>
  );
};

export const AboutStats = () => {
  const statsData = [
    { value: 15000, label: 'Active Players', suffix: '+' },
    { value: 500, label: 'Stadiums Listed' },
    { value: 120000, label: 'Matches Played' },
    { value: 95, label: 'Satisfaction Rate', suffix: '%' },
  ];

  return (
    <section className="py-16 px-4 bg-gray-50">
        <h1 className='text-gray-950 text-3xl font-bold mb-6 text-center'>OUR STATISTICS</h1>
      <div className="max-w-6xl mx-auto">
        <GradientDivider />
        <StatsCounter stats={statsData} />
      </div>
    </section>
  );
};

