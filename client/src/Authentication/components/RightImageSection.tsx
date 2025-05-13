import Players from "../../components/Public/Json/Players";
import { FIFAPlayerCard } from "./SIgnUp/Step4";
import { FormData } from "../../interfaces/interfaces";

interface RightImageSectionProps {
  showCard: boolean;
  formData?: FormData;
}

const RightImageSection = ({ showCard, formData }: RightImageSectionProps) => {
  return (
    <div className="w-full h-full flex items-center justify-center p-8 relative">
      <div className="w-full h-full max-w-md">
        <Players />
      </div>

      {showCard && formData && (
        <div className="absolute right-30 top-[70%] transform -translate-y-1/2 z-10 animate-fade-in-up">
          <FIFAPlayerCard
            position={formData.position}
            skills={formData.skills}
          />
        </div>
      )}
    </div>
  );
};

export default RightImageSection;